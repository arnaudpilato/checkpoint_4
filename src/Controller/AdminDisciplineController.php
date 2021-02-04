<?php

namespace App\Controller;

use App\Entity\Discipline;
use App\Form\DisciplineType;
use App\Repository\DisciplineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/discipline")
 */
class AdminDisciplineController extends AbstractController
{
    /**
     * @Route("/", name="admin_discipline_index", methods={"GET"})
     * @param DisciplineRepository $disciplineRepository
     * @return Response
     */
    public function index(DisciplineRepository $disciplineRepository): Response
    {
        return $this->render('admin/discipline/index.html.twig', [
            'disciplines' => $disciplineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_discipline_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $discipline = new Discipline();
        $form = $this->createForm(DisciplineType::class, $discipline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($discipline);
            $entityManager->flush();

            return $this->redirectToRoute('admin_discipline_index');
        }

        return $this->render('admin/discipline/new.html.twig', [
            'discipline' => $discipline,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_discipline_show", methods={"GET"})
     * @param Discipline $discipline
     * @return Response
     */
    public function show(Discipline $discipline): Response
    {
        return $this->render('admin/discipline/show.html.twig', [
            'discipline' => $discipline,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_discipline_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Discipline $discipline
     * @return Response
     */
    public function edit(Request $request, Discipline $discipline): Response
    {
        $form = $this->createForm(DisciplineType::class, $discipline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_discipline_index');
        }

        return $this->render('admin/discipline/edit.html.twig', [
            'discipline' => $discipline,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_discipline_delete", methods={"DELETE"})
     * @param Request $request
     * @param Discipline $discipline
     * @return Response
     */
    public function delete(Request $request, Discipline $discipline): Response
    {
        if ($this->isCsrfTokenValid('delete'.$discipline->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($discipline);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_discipline_index');
    }
}
