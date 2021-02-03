<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminHomeController extends AbstractController
{
    /**
     * @return Response
     * @route("/", name="admin_index")
     */
    public function index(): Response
    {
        return $this->render('admin/home/index.html.twig');
    }
}