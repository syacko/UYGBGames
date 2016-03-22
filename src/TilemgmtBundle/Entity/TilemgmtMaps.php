<?php

namespace TilemgmtBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TilemgmtMaps
 *
 * @ORM\Table(name="tilemgmt.maps")
 * @ORM\Entity
 */
class TilemgmtMaps
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tilemgmt.maps_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="map_name", type="string", length=50, nullable=false)
     */
    private $mapName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="map_playable", type="boolean", nullable=true)
     */
    private $mapPlayable = false;

    /**
     * @var string
     *
     * @ORM\Column(name="map_image_url", type="string", length=250, nullable=true)
     */
    private $mapImageUrl = 'MISSING';

    public function getId()
    {
        return $this->id;
    }

    public function getMapName()
    {
        return $this->mapName;
    }

    public function isMapPlayable()
    {
        return $this->mapPlayable;
    }

    public function getMapImageUrl()
    {
        return $this->mapImageUrl;
    }

    public function setMapImageUrl($mapImageUrl)
    {
        $this->mapImageUrl = $mapImageUrl;
    }

    public function setMapName($mapName)
    {
        $this->mapName = $mapName;
    }

    public function setMapPlayable($mapPlayable)
    {
        $this->mapPlayable = $mapPlayable;
    }
}

