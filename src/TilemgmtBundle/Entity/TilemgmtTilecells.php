<?php

namespace TilemgmtBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TilemgmtTileCells
 *
 * @ORM\Table(name="tilemgmt.tilecells")
 * @ORM\Entity
 */
class TilemgmtTilecells
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tilemgmt.tilecells_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="tile_id", type="bigint", nullable=false)
     */
    private $tileId;

    /**
     * @var integer
     *
     * @ORM\Column(name="map_id", type="bigint", nullable=false)
     */
    private $mapId;

    /**
     * @var string
     *
     * @ORM\Column(name="tilecell_col_row", type="string", nullable=false)
     */
    private $tilecellColRow;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cell_buildable", type="boolean", nullable=true)
     */
    private $cellBuildable = false;

    public function getId()
    {
        return $this->id;
    }

    public function getMapId()
    {
        return $this->mapId;
    }

    public function getTileId()
    {
        return $this->tileId;
    }

    public function getTilecellColRow()
    {
        return $this->tilecellColRow;
    }

    public function isCellBuildable()
    {
        return $this->cellBuildable;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMapId($mapId)
    {
        $this->mapId = $mapId;
    }

    public function setTileId($tileId)
    {
        $this->tileId = $tileId;
    }

    public function setTilecellColRow($tilecellColRow)
    {
        $this->tilecellColRow = $tilecellColRow;
    }

    public function buildTilecellColRow($tilecellCol, $tilecellRow)
    {
        $this->setTilecellColRow(json_encode(array('col'=>$tilecellCol,'row'=>$tilecellRow)));
    }

    public function setCellBuildable($cellBuildable)
    {
        $this->cellBuildable = $cellBuildable;
    }
}