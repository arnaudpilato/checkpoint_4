<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use App\Repository\HomeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param CarouselRepository $carouselRepository
     * @param HomeRepository $homeRepository
     * @return Response
     * @Route("/", name="home")
     */
    public function index(CarouselRepository $carouselRepository, HomeRepository $homeRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::HOME_PAGE]);

        return $this->render('home/index.html.twig', [
            'pictures' => $pictures,
            'homes' => $homeRepository->findAll()
        ]);
    }
}