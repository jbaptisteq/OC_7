<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use App\Entity\Product;

class ProductController extends AbstractController
{
    public function listAction(Request $request)
    {
        $cache = new FilesystemAdapter();
        // Create Cache with 1 day lifetime
        $productListCache = $cache->getItem('productList');
        $productListCache->expiresAfter(86400);

        if (!$productListCache->isHit()) {
            $em = $this->getDoctrine()->getManager();
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $productList = $repository->findAll();
            $productListCache->set($productList);
            $cache->save($productListCache);
        }

        return $productListCache->get();
    }

    public function getAction($id)
    {
        $cache = new FilesystemAdapter();
        // Create Immortal Cache until he die-delete... RIP
        $productCache = $cache->getItem('Product.'.$id);

        if (!$productCache->isHit()) {
            $em = $this->getDoctrine()->getManager();
            $repository = $this->getDoctrine()->getRepository(Product::class);
            $product = $repository->findOneBy(['id' => $id]);
            $productCache->set($product);
            $cache->save($productCache);
        }

        return $productCache->get();
    }

}
