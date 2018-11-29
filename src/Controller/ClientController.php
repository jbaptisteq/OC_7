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
        $response = new Response('Vous n\'avez pas les droits sur cette commande.', 403, ['Content-Type' => 'text/plain']);
        return $response;
    }

    public function getAction()
    {
        $response = new Response('Vous n\'avez pas les droits sur cette commande.', 403, ['Content-Type' => 'text/plain']);
        return $response;
    }
}
