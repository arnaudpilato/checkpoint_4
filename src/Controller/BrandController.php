<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Repository\BrandRepository;
use App\Repository\CarouselRepository;
use App\Repository\ClubRepository;
use App\Repository\DisciplineRepository;
use App\Repository\EquipmentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    /**
     * @param CarouselRepository $carouselRepository
     * @param BrandRepository $brandRepository
     * @return Response
     * @Route("/brand", name="brand")
     */
    public function index(CarouselRepository $carouselRepository, BrandRepository $brandRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::BRAND_PAGE]);

        return $this->render('brand/index.html.twig', [
            'brands' => $brandRepository->findAll(),
            'pictures' => $pictures,
        ]);
    }
}