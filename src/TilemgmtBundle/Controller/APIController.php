<?php

namespace TilemgmtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * TilemgmtAPI controller.
 *
 * @Route("/tilemgmt_api")
 */
class APIController extends Controller
{
    /**
     * @Route("/isBuildable")
     */
    public function isBuildableAction()
    {
        $jsLibrary = $this->container->getParameter("js_library");
        return $this->render('TilemgmtBundle:API:is_buildable.html.twig', array('jsLibrary' => $jsLibrary));
    }

    /**
     * @Route("/markUnbuildable")
     */
    public function markUnbuildableAction()
    {
        $jsLibrary = $this->container->getParameter("js_library");
        return $this->render('TilemgmtBundle:API:mark_unbuildable.html.twig', array('jsLibrary' => $jsLibrary));
    }

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $jsLibrary = $this->container->getParameter("js_library");
        return $this->render('TilemgmtBundle:API:index.html.twig', array('jsLibrary' => $jsLibrary, 'myName' => 'Scott',));
    }

}
