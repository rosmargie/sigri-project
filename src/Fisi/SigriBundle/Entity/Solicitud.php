<?php

namespace Fisi\SigriBundle\Entity;

/**
 * Solicitud
 */
class Solicitud
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
    private $tipo;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var \DateTime
     */
    private $fechaReporte;

    /**
     * @var \DateTime
     */
    private $fechaReserva;

    /**
     * @var \DateTime
     */
    private $horaReporte;

    /**
     * @var string
     */
    private $documento;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $calificacion;

    /**
     * @var string
     */
    private $prioridad;

    /**
     * @var string
     */
    private $subCategoria;

    /**
     * @var string
     */
    private $ip;


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
     * @return Solicitud
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Solicitud
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Solicitud
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechaReporte
     *
     * @param \DateTime $fechaReporte
     *
     * @return Solicitud
     */
    public function setFechaReporte($fechaReporte)
    {
        $this->fechaReporte = $fechaReporte;

        return $this;
    }

    /**
     * Get fechaReporte
     *
     * @return \DateTime
     */
    public function getFechaReporte()
    {
        return $this->fechaReporte;
    }

    /**
     * Set fechaReserva
     *
     * @param \DateTime $fechaReserva
     *
     * @return Solicitud
     */
    public function setFechaReserva($fechaReserva)
    {
        $this->fechaReserva = $fechaReserva;

        return $this;
    }

    /**
     * Get fechaReserva
     *
     * @return \DateTime
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }

    /**
     * Set horaReporte
     *
     * @param \DateTime $horaReporte
     *
     * @return Solicitud
     */
    public function setHoraReporte($horaReporte)
    {
        $this->horaReporte = $horaReporte;

        return $this;
    }

    /**
     * Get horaReporte
     *
     * @return \DateTime
     */
    public function getHoraReporte()
    {
        return $this->horaReporte;
    }

    /**
     * Set documento
     *
     * @param string $documento
     *
     * @return Solicitud
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Solicitud
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
     * Set calificacion
     *
     * @param string $calificacion
     *
     * @return Solicitud
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;

        return $this;
    }

    /**
     * Get calificacion
     *
     * @return string
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * Set prioridad
     *
     * @param string $prioridad
     *
     * @return Solicitud
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
     * Set subCategoria
     *
     * @param string $subCategoria
     *
     * @return Solicitud
     */
    public function setSubCategoria($subCategoria)
    {
        $this->subCategoria = $subCategoria;

        return $this;
    }

    /**
     * Get subCategoria
     *
     * @return string
     */
    public function getSubCategoria()
    {
        return $this->subCategoria;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Solicitud
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }
}

