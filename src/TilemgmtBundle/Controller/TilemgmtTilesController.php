<?php

namespace TilemgmtBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TilemgmtBundle\Entity\TilemgmtTiles;
use TilemgmtBundle\Form\TilemgmtTilesType;

/**
 * TilemgmtTiles controller.
 *
 * @Route("/tilemgmttiles")
 */
class TilemgmtTilesController extends Controller
{
    /**
     * Lists all TilemgmtTiles entities.
     *
     * @Route("/", name="tilemgmttiles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tilemgmtTiles = $em->getRepository('TilemgmtBundle:TilemgmtTiles')->findAll();

        return $this->render('tilemgmttiles/index.html.twig', array(
            'tilemgmtTiles' => $tilemgmtTiles,
        ));
    }

    /**
     * Creates a new TilemgmtTiles entity.
     *
     * @Route("/new", name="tilemgmttiles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tilemgmtTile = new TilemgmtTiles();
        $form = $this->createForm('TilemgmtBundle\Form\TilemgmtTilesType', $tilemgmtTile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tilemgmtTile);
            $em->flush();

            return $this->redirectToRoute('tilemgmttiles_show', array('id' => $tilemgmtTile->getId()));
        }

        return $this->render('tilemgmttiles/new.html.twig', array(
            'tilemgmtTile' => $tilemgmtTile,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TilemgmtTiles entity.
     *
     * @Route("/{id}", name="tilemgmttiles_show")
     * @Method("GET")
     */
    public function showAction(TilemgmtTiles $tilemgmtTile)
    {
        $deleteForm = $this->createDeleteForm($tilemgmtTile);

        return $this->render('tilemgmttiles/show.html.twig', array(
            'tilemgmtTile' => $tilemgmtTile,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TilemgmtTiles entity.
     *
     * @Route("/{id}/edit", name="tilemgmttiles_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TilemgmtTiles $tilemgmtTile)
    {
        $deleteForm = $this->createDeleteForm($tilemgmtTile);
        $editForm = $this->createForm('TilemgmtBundle\Form\TilemgmtTilesType', $tilemgmtTile);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tilemgmtTile);
            $em->flush();

            return $this->redirectToRoute('tilemgmttiles_edit', array('id' => $tilemgmtTile->getId()));
        }

        return $this->render('tilemgmttiles/edit.html.twig', array(
            'tilemgmtTile' => $tilemgmtTile,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TilemgmtTiles entity.
     *
     * @Route("/{id}", name="tilemgmttiles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TilemgmtTiles $tilemgmtTile)
    {
        $form = $this->createDeleteForm($tilemgmtTile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tilemgmtTile);
            $em->flush();
        }

        return $this->redirectToRoute('tilemgmttiles_index');
    }

    /**
     * Creates a form to delete a TilemgmtTiles entity.
     *
     * @param TilemgmtTiles $tilemgmtTile The TilemgmtTiles entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TilemgmtTiles $tilemgmtTile)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tilemgmttiles_delete', array('id' => $tilemgmtTile->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
