<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Form\AddFormType;
use Symfony\Component\HttpFoundation\Request;

class AddProductController extends AbstractController
{
    /**
     * @Route("/add", name="add_product")
     */
    public function index(Request $request): Response
    {

        $product = new Product();
        $form = $this->createForm(AddFormType::class, $product);

        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form->isValid()){
            $product = $form -> getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
        }

        return $this->render('add_product/index.html.twig', [
            'controller_name' => 'AddProductController',
            'form' => $form -> createView(),
        ]);
    }
}
