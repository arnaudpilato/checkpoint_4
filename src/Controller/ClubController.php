<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use App\Repository\ClubRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @param CarouselRepository $carouselRepository
     * @param ClubRepository $clubRepository
     * @return Response
     * @Route("/club", name="club")
     */
    public function index(CarouselRepository $carouselRepository, ClubRepository $clubRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::CLUB_PAGE]);

        return $this->render('club/index.html.twig', [
            'clubs' => $clubRepository->findAll(),
            'pictures' => $pictures,
        ]);
    }
}