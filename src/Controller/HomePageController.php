<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page", methods={"GET"})
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('product/showHome.html.twig', [
            'products' => $productRepository->findActived(),
        ]);
    }
}
