<?php

namespace TilemgmtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class APIController extends Controller
{
    /**
     * @Route("/index")
     */
    public function indexAction()
    {
        $user = array('name' => 'Scott', 'active' => true);
        return $this->render('TilemgmtBundle:API:index.html.twig', array('user' => $user));
    }

}
