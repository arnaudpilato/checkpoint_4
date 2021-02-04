<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use App\Repository\ClubRepository;
use App\Repository\DisciplineRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DisciplineController extends AbstractController
{
    /**
     * @param CarouselRepository $carouselRepository
     * @param DisciplineRepository $disciplineRepository
     * @return Response
     * @Route("/discipline", name="discipline")
     */
    public function index(CarouselRepository $carouselRepository, DisciplineRepository $disciplineRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::CLUB_PAGE]);

        return $this->render('discipline/index.html.twig', [
            'disciplines' => $disciplineRepository->findAll(),
            'pictures' => $pictures,
        ]);
    }
}