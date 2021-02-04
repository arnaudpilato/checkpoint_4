<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use App\Repository\ClubRepository;
use App\Repository\DisciplineRepository;
use App\Repository\EquipmentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EquipmentController extends AbstractController
{
    /**
     * @param CarouselRepository $carouselRepository
     * @param EquipmentRepository $equipmentRepository
     * @return Response
     * @Route("/equipment", name="equipment")
     */
    public function index(CarouselRepository $carouselRepository, EquipmentRepository $equipmentRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::EQUIPMENT_PAGE]);

        return $this->render('equipment/index.html.twig', [
            'equipments' => $equipmentRepository->findAll(),
            'pictures' => $pictures,
        ]);
    }
}