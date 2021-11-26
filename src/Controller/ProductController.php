<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product")
     */
    public function index($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $repository->find($id);

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
        ]);
    }
}
