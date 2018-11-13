<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use App\Entity\Client;


// Blocage des routes clients pour les utilisateurs client
class ClientController extends AbstractController
{
    public function listAction()
    {
        $response = new Response('Vous n\'avez pas les droits sur cette commande.', Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'text/plain']);
        return $response;
    }

    public function getAction($id)
    {
        $response = new Response('Vous n\'avez pas les droits sur cette commande.', Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'text/plain']);
        return $response;
    }
}
