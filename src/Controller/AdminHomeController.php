<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/home")
 */
class AdminHomeController extends AbstractController
{
    /**
     * @Route("/", name="admin_home_index", methods={"GET"})
     * @param HomeRepository $homeRepository
     * @return Response
     */
    public function index(HomeRepository $homeRepository): Response
    {
        return $this->render('admin/home/index.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_home_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $home = new Home();
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($home);
            $entityManager->flush();
            $this->addFlash('success', 'La rubrique à bien été créée');

            return $this->redirectToRoute('admin_home_index');
        }

        return $this->render('admin/home/new.html.twig', [
            'home' => $home,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_home_show", methods={"GET"})
     * @param Home $home
     * @return Response
     */
    public function show(Home $home): Response
    {
        return $this->render('admin/home/show.html.twig', [
            'home' => $home,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_home_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Home $home
     * @return Response
     */
    public function edit(Request $request, Home $home): Response
    {
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La rubrique à bien été modifiée');

            return $this->redirectToRoute('admin_home_index');
        }

        return $this->render('admin/home/edit.html.twig', [
            'home' => $home,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_home_delete", methods={"DELETE"})
     * @param Request $request
     * @param Home $home
     * @return Response
     */
    public function delete(Request $request, Home $home): Response
    {
        if ($this->isCsrfTokenValid('delete'.$home->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($home);
            $entityManager->flush();
            $this->addFlash('danger', 'La rubrique à été supprimée');
        }

        return $this->redirectToRoute('admin_home_index');
    }
}
