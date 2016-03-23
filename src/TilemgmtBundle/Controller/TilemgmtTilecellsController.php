<?php

namespace TilemgmtBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TilemgmtBundle\Entity\TilemgmtTilecells;
use TilemgmtBundle\Form\TilemgmtTilecellsType;

/**
 * TilemgmtTilecells controller.
 *
 * @Route("/tilemgmttilecells")
 */
class TilemgmtTilecellsController extends Controller
{
    /**
     * Lists all TilemgmtTilecells entities.
     *
     * @Route("/", name="tilemgmttilecells_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tilemgmtTilecells = $em->getRepository('TilemgmtBundle:TilemgmtTilecells')->findAll();

        return $this->render('tilemgmttilecells/index.html.twig', array(
            'tilemgmtTilecells' => $tilemgmtTilecells,
        ));
    }

    /**
     * Creates a new TilemgmtTilecells entity.
     *
     * @Route("/new", name="tilemgmttilecells_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tilemgmtTilecell = new TilemgmtTilecells();
        $form = $this->createForm('TilemgmtBundle\Form\TilemgmtTilecellsType', $tilemgmtTilecell);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tilemgmtTilecell);
            $em->flush();

            return $this->redirectToRoute('tilemgmttilecells_show', array('id' => $tilemgmtTilecell->getId()));
        }

        return $this->render('tilemgmttilecells/new.html.twig', array(
            'tilemgmtTilecell' => $tilemgmtTilecell,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TilemgmtTilecells entity.
     *
     * @Route("/{id}", name="tilemgmttilecells_show")
     * @Method("GET")
     */
    public function showAction(TilemgmtTilecells $tilemgmtTilecell)
    {
        $deleteForm = $this->createDeleteForm($tilemgmtTilecell);

        return $this->render('tilemgmttilecells/show.html.twig', array(
            'tilemgmtTilecell' => $tilemgmtTilecell,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TilemgmtTilecells entity.
     *
     * @Route("/{id}/edit", name="tilemgmttilecells_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TilemgmtTilecells $tilemgmtTilecell)
    {
        $deleteForm = $this->createDeleteForm($tilemgmtTilecell);
        $editForm = $this->createForm('TilemgmtBundle\Form\TilemgmtTilecellsType', $tilemgmtTilecell);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tilemgmtTilecell);
            $em->flush();

            return $this->redirectToRoute('tilemgmttilecells_edit', array('id' => $tilemgmtTilecell->getId()));
        }

        return $this->render('tilemgmttilecells/edit.html.twig', array(
            'tilemgmtTilecell' => $tilemgmtTilecell,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TilemgmtTilecells entity.
     *
     * @Route("/{id}", name="tilemgmttilecells_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TilemgmtTilecells $tilemgmtTilecell)
    {
        $form = $this->createDeleteForm($tilemgmtTilecell);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tilemgmtTilecell);
            $em->flush();
        }

        return $this->redirectToRoute('tilemgmttilecells_index');
    }

    /**
     * Creates a form to delete a TilemgmtTilecells entity.
     *
     * @param TilemgmtTilecells $tilemgmtTilecell The TilemgmtTilecells entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TilemgmtTilecells $tilemgmtTilecell)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tilemgmttilecells_delete', array('id' => $tilemgmtTilecell->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
