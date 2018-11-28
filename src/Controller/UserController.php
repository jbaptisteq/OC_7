<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use App\Entity\User;
use App\Entity\Client;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;


class UserController extends AbstractController
{
    public function listAction(Request $request, JWTTokenManagerInterface $jwtManager, JWTTokenAuthenticator $jwtAuthenticator)
    {
        // Récupération du clientId à partir du token JWT
        $preAuthToken = $jwtAuthenticator->getCredentials($request);
        $clientResource = $jwtManager->decode($preAuthToken);
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Client::class);
        $client = $repository->findOneBy(['username' => $clientResource['username']]);

        $cache = new FilesystemAdapter();
        $userListCache = $cache->getItem('UserList.'.$client->getId());
        $userListCache->expiresAfter(86400);

        if (!$userListCache->isHit()) {
            $em = $this->getDoctrine()->getManager();
            $repository = $this->getDoctrine()->getRepository(User::class);
            $users = $repository->findBy(['client' => $client->getId()]);

            $userListCache->set($users);
            $cache->save($userListCache);
        }

        return $userListCache->get();
    }

    public function getAction($id, Request $request, JWTTokenManagerInterface $jwtManager, JWTTokenAuthenticator $jwtAuthenticator)
    {
        // Récupération du clientId à partir du token JWT
        $preAuthToken = $jwtAuthenticator->getCredentials($request);
        $clientResource = $jwtManager->decode($preAuthToken);
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Client::class);
        $client = $repository->findOneBy(['username' => $clientResource['username']]);

        $cache = new FilesystemAdapter();
        $userCache = $cache->getItem('User.'.$id);
        $userCache->expiresAfter(86400); // Set expiration to 1 day

        if (!$userCache->isHit()) {
            $em = $this->getDoctrine()->getManager();
            $repository = $this->getDoctrine()->getRepository(User::class);
            $user = $repository->findOneBy(['id' => $id]);
            if ($user->getClient()->getId() !== $client->getId()) {
                $response = new Response('Vous n\'avez pas les droits sur cet utilisateur.', Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'text/plain']);
                return $response;
            }
            $userCache->set($user);
            $cache->save($userCache);
        }

        return $userCache->get();
    }

    public function postAction(Request $request, JWTTokenManagerInterface $jwtManager, JWTTokenAuthenticator $jwtAuthenticator)
    {
        // Récupération du clientId à partir du token JWT
        $preAuthToken = $jwtAuthenticator->getCredentials($request);
        $clientResource = $jwtManager->decode($preAuthToken);
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Client::class);
        $client = $repository->findOneBy(['username' => $clientResource['username']]);

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(User::class);

        $name = $request->request->get('name');

        $user = new User();
        $user->setName($name);
        $user->setClient($client);
        $em->persist($user);
        $em->flush();

        $cache = new FilesystemAdapter();
        $userCache = $cache->getItem('UserList.'.$client->getId());

        if ($userCache->isHit()) {
            $cache->deleteItem('UserList.'.$client->getId());
        }

        return new Response('Utilisateur enregistré', Response::HTTP_CREATED, ['Content-Type' => 'text/plain', 'Location' => '/api/users/'.$user->getId()]);
    }

    public function deleteAction($id, Request $request, JWTTokenManagerInterface $jwtManager, JWTTokenAuthenticator $jwtAuthenticator)
    {
        // Récupération du clientId à partir du token JWT
        $preAuthToken = $jwtAuthenticator->getCredentials($request);
        $clientResource = $jwtManager->decode($preAuthToken);
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Client::class);
        $client = $repository->findOneBy(['username' => $clientResource['username']]);

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->findOneBy(['id' => $id]);

        $clientUserDeleted = $user->getClient();

        if ($clientUserDeleted !== $client) {
            $response = new Response('Vous n\'avez pas le droit de supprimer cet utilisateur.', Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'text/plain']);
            return $response;
        }
        $em->remove($user);
        $em->flush();

        // Delete cache for this user
        $cache = new FilesystemAdapter();
        $userCache = $cache->getItem('User.'.$id);

        if ($userCache->isHit()) {
            $cache->deleteItem('User.'.$id);
        }

        return new Response('Utilisateur supprimé', Response::HTTP_OK, ['Content-Type' => 'text/plain']);
    }
}
