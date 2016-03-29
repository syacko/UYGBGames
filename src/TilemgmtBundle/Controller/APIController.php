<?php

namespace TilemgmtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use TilemgmtBundle\Entity\TilemgmtTilecells;

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
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        return new JsonResponse($data);
    }

    /**
     * @Route("/markUnbuildable")
     */
    public function markUnbuildableAction()
    {
        $tilemgmtTilecells = new TilemgmtTilecells();
        $tilemgmtTilecells->setMapId(26);
        $tilemgmtTilecells->setTileId(25);
        $tilemgmtTilecells->setTilecellColRow(0, 0);
        $tilemgmtTilecells->setCellBuildable(true);

        $em = $this->getDoctrine()->getManager();
        $em->persist($tilemgmtTilecells);
        $em->flush();

        $tilecellData = array('col' => 0, 'row' => 0);

        $data = array(
            'lucky_number' => rand(0, 100),
            'k' => json_encode($tilecellData),
            'operation' => 'suceeded',
        );

        return new JsonResponse($data);
    }

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $jsLibrary = $this->container->getParameter("js_library");

        return $this->render(
            'TilemgmtBundle:API:index.html.twig',
            array('jsLibrary' => $jsLibrary, 'myName' => 'Scott',)
        );
    }

}
