<?php

namespace TilemgmtBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TilemgmtBundle\Entity\TilemgmtMaps;
use TilemgmtBundle\Form\TilemgmtMapsType;

/**
 * TilemgmtMaps controller.
 *
 * @Route("/tilemgmtmaps")
 */
class TilemgmtMapsController extends Controller
{
    private $jsLibrary;

    private function __constructor()
    {
        $jsLibrary = $this->container->getParameter("js_library");

    }

    /**
     * Lists all TilemgmtMaps entities.
     *
     * @Route("/", name="tilemgmtmaps_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tilemgmtMaps = $em->getRepository('TilemgmtBundle:TilemgmtMaps')->findAll();

        return $this->render(
            'tilemgmtmaps/index.html.twig',
            array(
                'tilemgmtMaps' => $tilemgmtMaps,
                'jsLibrary' => $this->jsLibrary,
            )
        );
    }

    /**
     * Creates a new TilemgmtMaps entity.
     *
     * @Route("/new", name="tilemgmtmaps_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tilemgmtMap = new TilemgmtMaps();
        $form = $this->createForm('TilemgmtBundle\Form\TilemgmtMapsType', $tilemgmtMap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tilemgmtMap);
            $em->flush();

            return $this->redirectToRoute('tilemgmtmaps_show', array('id' => $tilemgmtMap->getId(), 'jsLibrary' => $this->jsLibrary,));
        }

        return $this->render(
            'tilemgmtmaps/new.html.twig',
            array(
                'tilemgmtMap' => $tilemgmtMap,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a TilemgmtMaps entity.
     *
     * @Route("/{id}", name="tilemgmtmaps_show")
     * @Method("GET")
     */
    public function showAction(TilemgmtMaps $tilemgmtMap)
    {
        $deleteForm = $this->createDeleteForm($tilemgmtMap);

        return $this->render(
            'tilemgmtmaps/show.html.twig',
            array(
                'tilemgmtMap' => $tilemgmtMap,
                'jsLibrary' => $this->jsLibrary,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing TilemgmtMaps entity.
     *
     * @Route("/{id}/edit", name="tilemgmtmaps_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TilemgmtMaps $tilemgmtMap)
    {
        $deleteForm = $this->createDeleteForm($tilemgmtMap);
        $editForm = $this->createForm('TilemgmtBundle\Form\TilemgmtMapsType', $tilemgmtMap);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tilemgmtMap);
            $em->flush();

            return $this->redirectToRoute('tilemgmtmaps_edit', array('id' => $tilemgmtMap->getId()));
        }

        return $this->render(
            'tilemgmtmaps/edit.html.twig',
            array(
                'tilemgmtMap' => $tilemgmtMap,
                'jsLibrary' => $this->jsLibrary,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a TilemgmtMaps entity.
     *
     * @Route("/{id}", name="tilemgmtmaps_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TilemgmtMaps $tilemgmtMap)
    {
        $form = $this->createDeleteForm($tilemgmtMap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tilemgmtMap);
            $em->flush();
        }

        return $this->redirectToRoute('tilemgmtmaps_index');
    }

    /**
     * Creates a form to delete a TilemgmtMaps entity.
     *
     * @param TilemgmtMaps $tilemgmtMap The TilemgmtMaps entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TilemgmtMaps $tilemgmtMap)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tilemgmtmaps_delete', array('id' => $tilemgmtMap->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
