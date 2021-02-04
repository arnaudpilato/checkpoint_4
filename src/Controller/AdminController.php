<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @param CarouselRepository $carouselRepository
     * @return Response
     * @Route("/admin", name="admin_index")
     */
    public function index(CarouselRepository $carouselRepository): Response
    {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::HOME_PAGE]);

        return $this->render('admin/index.html.twig', [
            'pictures' => $pictures,
        ]);
    }
}
