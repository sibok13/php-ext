<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class AllProductController extends AbstractController
{
    /**
     * @Route("/product", name="all_product")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();

        return $this->render('all_product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products,
        ]);
    }
}
