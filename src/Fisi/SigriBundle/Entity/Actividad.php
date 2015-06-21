<?php

namespace Fisi\SigriBundle\Entity;

/**
 * Actividad
 */
class Actividad
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \DateTime
     */
    private $fechaEInicio;

    /**
     * @var \DateTime
     */
    private $fechaEFin;

    /**
     * @var \DateTime
     */
    private $fechaRInicio;

    /**
     * @var \DateTime
     */
    private $fechaRFin;

    /**
     * @var string
     */
    private $prioridad;

    /**
     * @var integer
     */
    private $peso;

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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Actividad
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Actividad
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
     * Set fechaEInicio
     *
     * @param \DateTime $fechaEInicio
     *
     * @return Actividad
     */
    public function setFechaEInicio($fechaEInicio)
    {
        $this->fechaEInicio = $fechaEInicio;

        return $this;
    }

    /**
     * Get fechaEInicio
     *
     * @return \DateTime
     */
    public function getFechaEInicio()
    {
        return $this->fechaEInicio;
    }

    /**
     * Set fechaEFin
     *
     * @param \DateTime $fechaEFin
     *
     * @return Actividad
     */
    public function setFechaEFin($fechaEFin)
    {
        $this->fechaEFin = $fechaEFin;

        return $this;
    }

    /**
     * Get fechaEFin
     *
     * @return \DateTime
     */
    public function getFechaEFin()
    {
        return $this->fechaEFin;
    }

    /**
     * Set fechaRInicio
     *
     * @param \DateTime $fechaRInicio
     *
     * @return Actividad
     */
    public function setFechaRInicio($fechaRInicio)
    {
        $this->fechaRInicio = $fechaRInicio;

        return $this;
    }

    /**
     * Get fechaRInicio
     *
     * @return \DateTime
     */
    public function getFechaRInicio()
    {
        return $this->fechaRInicio;
    }

    /**
     * Set fechaRFin
     *
     * @param \DateTime $fechaRFin
     *
     * @return Actividad
     */
    public function setFechaRFin($fechaRFin)
    {
        $this->fechaRFin = $fechaRFin;

        return $this;
    }

    /**
     * Get fechaRFin
     *
     * @return \DateTime
     */
    public function getFechaRFin()
    {
        return $this->fechaRFin;
    }

    /**
     * Set prioridad
     *
     * @param string $prioridad
     *
     * @return Actividad
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    /**
     * Get prioridad
     *
     * @return string
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Set peso
     *
     * @param integer $peso
     *
     * @return Actividad
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return integer
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set progreso
     *
     * @param integer $progreso
     *
     * @return Actividad
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

