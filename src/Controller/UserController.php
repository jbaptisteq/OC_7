<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use App\Entity\User;
use App\Entity\Client;

class UserController extends AbstractController
{
    public function newUser(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Client::class);

        $username = $request->request->get('_username');
        $password = $request->request->get('_password');
        $id = $request->request->get('_client');
        $client = $repository->findOneBy(['id' => $id]);

        $user = new User();
        $user->setUsername($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setClient($client);
        $em->persist($user);
        $em->flush();

        return new Response(sprintf('User %s successfully created', $user->getUsername()));
    }

    // Je met en cache une requête dite "safe"
    // - Je vérifie si le cache existe pour un User1
    //     - Si non, je le créé
    // - Je return ce que j'ai dans mon cache

    // Cas d'invalidation du cache de User1
    // - Destruction du user
    // - Expiration du cache

    public function listAction(Request $request)
    {
        // Récupération du clientId à partir du token JWT
        // $preAuthToken = $this->jwtAuthenticator->getCredentials($request);
        // $client = $this->jwtManager->decode($preAuthToken);

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->findBy(['client' => $client->getId()]);
    }

    public function getAction($id)
    {
        $cache = new FilesystemAdapter();
        $userCache = $cache->getItem('User.'.$id);
        $userCache->expiresAfter(60); // Set expiration to 60 seconds
        // $userCache->expiresAfter(DateInterval::createFromDateString('1 hour'));

        if (!$userCache->isHit()) {
            $em = $this->getDoctrine()->getManager();
            $repository = $this->getDoctrine()->getRepository(User::class);
            $user = $repository->findOneBy(['id' => $id]);
            $userCache->set($user);
            $cache->save($userCache);
        }

        return $userCache->get();
    }

    public function deleteAction($id)
    {
        // Todo : Suppression normale de l'user en BDD

        // Delete cache for this user
        $cache = new FilesystemAdapter();
        $userCache = $cache->getItem('User.'.$id);

        if ($userCache->isHit()) {
            $cache->deleteItem('User.'.$id);
        }

        return new Response('Pouet');
    }
}
