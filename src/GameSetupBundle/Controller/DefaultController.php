<?php

namespace GameSetupBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Game Setup controller.
 *
 * @Route("/gamesetup")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
//        return $this->render('GameSetupBundle:Default:index.html.twig'); DO NOT USE
        $imgLocal = $this->container->getParameter("img_local");
        $jsLibrary = $this->container->getParameter("js_library");
//        echo $imgLocal;
        return $this->render('GameSetupBundle:Default:gamesetup.html.twig', array('imgLocal' => $imgLocal, 'jsLibrary' => $jsLibrary));
    }
}
