<?php

namespace Fisi\SigriBundle\Entity;

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
    protected $idsolicitud;
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
     * @ORM\Column(type="date",name="FECHA_REPORTE",nullable=true)
     */
    protected $fechareporte;
    /**
     * @ORM\Column(type="date",name="FECHA_RESERVA",nullable=true)
     */
    protected $fechareserva;
    /**
     * @ORM\Column(type="time",name="HORA_REPORTE")
     */
    protected $horareporte;
   /**
     * @ORM\Column(type="string",name="DOCUMENTO",length=100,nullable=true)
     */
    protected $documento;
    
    /**
     * @ORM\Column(type="string",name="DESCRIPCION", length=500)
     */
    protected $descripcion;
    /**
     * @ORM\Column(type="string",name="CALIFICACION", length=10,nullable=true)
     */
    protected $calificacion;
    /**
     * @ORM\Column(type="string",name="PRIORIDAD", length=5,nullable=true)
     */
    protected $prioridad;/**
     * @ORM\Column(type="string",name="SUB_CATEGORIA", length=15,nullable=true)
     */
    protected $subcategoria;
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
  
    public function getIdsolicitud() {
        return $this->idsolicitud;
    }

    public function setIdsolicitud($idsolicitud) {
        $this->idsolicitud = $idsolicitud;
    }

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

    

    public function getTitulo() {
        return $this->titulo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getEstado() {
        return $this->estado;
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

   

    public function getIp() {
        return $this->ip;
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

    public function getFechareporte() {
        return $this->fechareporte;
    }

    public function getFechareserva() {
        return $this->fechareserva;
    }

    public function setFechareporte($fechareporte) {
        $this->fechareporte = $fechareporte;
    }

    public function setFechareserva($fechareserva) {
        $this->fechareserva = $fechareserva;
    }

    
    public function getHorareporte() {
        return $this->horareporte;
    }

    public function setHorareporte($horareporte) {
        $this->horareporte = $horareporte;
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

    public function getSubcategoria() {
        return $this->subcategoria;
    }

    public function setSubcategoria($subcategoria) {
        $this->subcategoria = $subcategoria;
    }

    
    public function setIp($ip) {
        $this->ip = $ip;
    }


    

}
