<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 * @package App\Controller
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @param CarouselRepository $carouselRepository
     * @return Response
     * @Route("/", name="home")
     */
    public function index(CarouselRepository $carouselRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::HOME_PAGE]);

        return $this->render('home/index.html.twig', [
            'pictures' => $pictures,
        ]);
    }
}