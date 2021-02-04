<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    /**
     * @return Response
     * @Route("/brand", name="brand")
     */
    public function index(): Response
    {
        return $this->render('brand/index.html.twig');
    }
}