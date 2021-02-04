<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @param CarouselRepository $carouselRepository
     * @return Response
     * @Route("/club", name="club")
     */
    public function index(CarouselRepository $carouselRepository): Response
    {
        return $this->render('club/index.html.twig');
    }
}