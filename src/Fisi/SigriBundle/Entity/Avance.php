<?php

namespace Fisi\SigriBundle\Entity;

/**
 * Avance
 */
class Avance
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaAvance;

    /**
     * @var \DateTime
     */
    private $horaAvance;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $progreso;


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
     * Set fechaAvance
     *
     * @param \DateTime $fechaAvance
     *
     * @return Avance
     */
    public function setFechaAvance($fechaAvance)
    {
        $this->fechaAvance = $fechaAvance;

        return $this;
    }

    /**
     * Get fechaAvance
     *
     * @return \DateTime
     */
    public function getFechaAvance()
    {
        return $this->fechaAvance;
    }

    /**
     * Set horaAvance
     *
     * @param \DateTime $horaAvance
     *
     * @return Avance
     */
    public function setHoraAvance($horaAvance)
    {
        $this->horaAvance = $horaAvance;

        return $this;
    }

    /**
     * Get horaAvance
     *
     * @return \DateTime
     */
    public function getHoraAvance()
    {
        return $this->horaAvance;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Avance
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set progreso
     *
     * @param integer $progreso
     *
     * @return Avance
     */
    public function setProgreso($progreso)
    {
        $this->progreso = $progreso;

        return $this;
    }

    /**
     * Get progreso
     *
     * @return integer
     */
    public function getProgreso()
    {
        return $this->progreso;
    }
}

