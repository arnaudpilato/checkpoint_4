<?php

namespace App\Controller;

use App\Entity\Equipment;
use App\Form\EquipmentType;
use App\Repository\EquipmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/equipment")
 */
class AdminEquipmentController extends AbstractController
{
    /**
     * @Route("/", name="admin_equipment_index", methods={"GET"})
     * @param EquipmentRepository $equipmentRepository
     * @return Response
     */
    public function index(EquipmentRepository $equipmentRepository): Response
    {
        return $this->render('admin/equipment/index.html.twig', [
            'equipment' => $equipmentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_equipment_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $equipment = new Equipment();
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipment);
            $entityManager->flush();
            $this->addFlash('success', "L'équipement à bien été créé");

            return $this->redirectToRoute('admin_equipment_index');
        }

        return $this->render('admin/equipment/new.html.twig', [
            'equipment' => $equipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_equipment_show", methods={"GET"})
     * @param Equipment $equipment
     * @return Response
     */
    public function show(Equipment $equipment): Response
    {
        return $this->render('admin/equipment/show.html.twig', [
            'equipment' => $equipment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_equipment_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Equipment $equipment
     * @return Response
     */
    public function edit(Request $request, Equipment $equipment): Response
    {
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "L'équipement à bien été créé");

            return $this->redirectToRoute('admin_equipment_index');
        }

        return $this->render('admin/equipment/edit.html.twig', [
            'equipment' => $equipment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_equipment_delete", methods={"DELETE"})
     * @param Request $request
     * @param Equipment $equipment
     * @return Response
     */
    public function delete(Request $request, Equipment $equipment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($equipment);
            $entityManager->flush();
            $this->addFlash('danger', "L'équipement à été supprimé");
        }

        return $this->redirectToRoute('admin_equipment_index');
    }
}
