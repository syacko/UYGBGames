<?php

namespace TilemgmtBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TilemgmtTiles
 *
 * @ORM\Table(name="tilemgmt.tiles")
 * @ORM\Entity
 */
class TilemgmtTiles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tilemgmt.tiles_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="map_id", type="bigint", nullable=false)
     */
    private $mapId;

    /**
     * @var string
     *
     * @ORM\Column(name="tile_col_row", type="string", length=50, nullable=true)
     */
    private $tileColRow;

    /**
     * @var string
     *
     * @ORM\Column(name="tile_image_url", type="string", length=250, nullable=true)
     */
    private $tileImageUrl = 'MISSING';

    /**
     * @var string
     *
     * @ORM\Column(name="tile_sector_name", type="string", length=50, nullable=true)
     */
    private $tileSectorName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tile_playable", type="boolean", nullable=true)
     */
    private $tilePlayable = false;


    public function getId()
    {
        return $this->id;
    }

    public function getMapId()
    {
        return $this->mapId;
    }

    public function getTileColRow()
    {
        return $this->tileColRow;
    }

    public function getTileImageUrl()
    {
        return $this->tileImageUrl;
    }

    public function getTileSectorName()
    {
        return $this->tileSectorName;
    }

    public function isTilePlayable()
    {
        return $this->mapPlayable;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMapId($mapId)
    {
        $this->mapId = $mapId;
    }

    public function setTileColRow($tileColRow)
    {
        $this->tileColRow = $tileColRow;
    }

    public function setTilePlayable($tilePlayable)
    {
        $this->tilePlayable = $tilePlayable;
    }

    public function setTileImageUrl($tileImageUrl)
    {
        $this->tileImageUrl = $tileImageUrl;
    }

    public function setTileSectorName($tileSectorName)
    {
        $this->tileSectorName = $tileSectorName;
    }
}

