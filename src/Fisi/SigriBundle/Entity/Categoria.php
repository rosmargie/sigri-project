<?php

namespace Fisi\SigriBundle\Entity;

/**
 * Categoria
 */
class Categoria
{
    /**
     * @var integer
     */
    private $id_categoria;

    /**
     * @var string
     */
    private $nombreCategoria;

    /**
     * @var string
     */
    private $descripcionCategoria;


    /**
     * Get Id_categoria
     *
     * @return integer
     */
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    /**
     * Set nombreCategoria
     *
     * @param string $nombreCategoria
     *
     * @return Categoria
     */
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;

        return $this;
    }

    /**
     * Get nombreCategoria
     *
     * @return string
     */
    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    /**
     * Set descripcionCategoria
     *
     * @param string $descripcionCategoria
     *
     * @return Categoria
     */
    public function setDescripcionCategoria($descripcionCategoria)
    {
        $this->descripcionCategoria = $descripcionCategoria;

        return $this;
    }

    /**
     * Get descripcionCategoria
     *
     * @return string
     */
    public function getDescripcionCategoria()
    {
        return $this->descripcionCategoria;
    }
}

