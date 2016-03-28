<?php

namespace TilemgmtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Route("/index")
     * @Route("/tilemgmt")
     */
    public function indexAction()
    {
        return $this->render('TilemgmtBundle:Default:index.html.twig');
    }
}
