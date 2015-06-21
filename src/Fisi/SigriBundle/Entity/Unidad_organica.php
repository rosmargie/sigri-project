<?php

namespace Fisi\SigriBundle\Entity;

/**
 * Unidad_organica
 */
class Unidad_organica
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreUnidad;

    /**
     * @var integer
     */
    private $anexo;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreUnidad
     *
     * @param string $nombreUnidad
     *
     * @return Unidad_organica
     */
    public function setNombreUnidad($nombreUnidad)
    {
        $this->nombreUnidad = $nombreUnidad;

        return $this;
    }

    /**
     * Get nombreUnidad
     *
     * @return string
     */
    public function getNombreUnidad()
    {
        return $this->nombreUnidad;
    }

    /**
     * Set anexo
     *
     * @param integer $anexo
     *
     * @return Unidad_organica
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;

        return $this;
    }

    /**
     * Get anexo
     *
     * @return integer
     */
    public function getAnexo()
    {
        return $this->anexo;
    }
}

