<?php

namespace Fisi\SigriBundle\Entity;

<<<<<<< HEAD
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

=======
use Fisi\SigriBundle\Entity\Categoria;
use Fisi\SigriBundle\Entity\Empleado;
use Doctrine\ORM\Mapping as ORM;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Solicitud
 *
 * @author Usuario
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="solicitud")
 */
class Solicitud {
/**
     * @ORM\Id
     * @ORM\Column(type="integer", name="ID_SOLICITUD")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $id_solicitud;
    /**
     * @ORM\Column(type="string",name="TITULO", length=30)
     */
    protected $titulo;
     /**
     * @ORM\Column(type="string",name="TIPO", length=30)
     */
    protected $tipo;
    /**
     * @ORM\Column(type="string",name="ESTADO", length=12)
     */
    protected $estado;
    /**
     * @ORM\Column(type="date",name="FECHA_REPORTE")
     */
    protected $fecha_reporte;
    /**
     * @ORM\Column(type="date",name="FECHA_RESERVA")
     */
    protected $fecha_reserva;
    /**
     * @ORM\Column(type="time",name="HORA_REPORTE")
     */
    protected $hora_reporte;
   /**
     * @ORM\Column(type="string",name="DOCUMENTO",length=100)
     */
    protected $documento;
    
    /**
     * @ORM\Column(type="string",name="DESCRIPCION", length=500)
     */
    protected $descripcion;
    /**
     * @ORM\Column(type="string",name="CALIFICACION", length=10)
     */
    protected $calificacion;
    /**
     * @ORM\Column(type="string",name="PRIORIDAD", length=5)
     */
    protected $prioridad;/**
     * @ORM\Column(type="string",name="SUB_CATEGORIA", length=15)
     */
    protected $sub_categoria;
    /**
     * @ORM\Column(type="string",name="IP", length=20)
     */
    protected $ip;
     /*Objeto empleado 1..m*/
    /**
     * @ORM\ManyToOne(targetEntity="Empleado")
     * @ORM\JoinColumn(name="EMPLEADO_ID_EMPLEADO", referencedColumnName="ID_EMPLEADO")
     */
    protected $empleado;
    /*Objeto categoria 1..m*/
    /**
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumn(name="CATEGORIA_ID_CATEGORIA", referencedColumnName="ID_CATEGORIA")
     */
    protected $categoria;
    
    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

        public function getEmpleado() {
        return $this->empleado;
    }

    public function setEmpleado($empleado) {
        $this->empleado = $empleado;
    }

        public function getId_solicitud() {
        return $this->id_solicitud;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha_reporte() {
        return $this->fecha_reporte;
    }

    public function getFecha_reserva() {
        return $this->fecha_reserva;
    }

    public function getHora_reporte() {
        return $this->hora_reporte;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCalificacion() {
        return $this->calificacion;
    }

    public function getPrioridad() {
        return $this->prioridad;
    }

    public function getSub_categoria() {
        return $this->sub_categoria;
    }

    public function getIp() {
        return $this->ip;
    }

    public function setId_solicitud($id_solicitud) {
        $this->id_solicitud = $id_solicitud;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFecha_reporte($fecha_reporte) {
        $this->fecha_reporte = $fecha_reporte;
    }

    public function setFecha_reserva($fecha_reserva) {
        $this->fecha_reserva = $fecha_reserva;
    }

    public function setHora_reporte($hora_reporte) {
        $this->hora_reporte = $hora_reporte;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }

    public function setPrioridad($prioridad) {
        $this->prioridad = $prioridad;
    }

    public function setSub_categoria($sub_categoria) {
        $this->sub_categoria = $sub_categoria;
    }

    public function setIp($ip) {
        $this->ip = $ip;
    }


    

}
>>>>>>> master
