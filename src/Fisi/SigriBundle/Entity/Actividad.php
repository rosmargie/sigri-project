<?php
namespace Fisi\SigriBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actividad
 *
 * @author Usuario
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="actividad")
 */
class Actividad {
    
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="ID_ACTIVIDAD")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
     protected $idactividad;
     /**
     * @ORM\Column(type="string",name="TITULO", length=30)
     */      

      protected $tituloact;
      /**
     * @ORM\Column(type="string",name="DESCRIPCION", length=250)
     */
    protected $descripcionact;
    /**
     * @ORM\Column(type="date",name="FECHA_E_INICIO",nullable=true)
     */
    protected $fechaeinicio;
    /**
     * @ORM\Column(type="date",name="FECHA_E_FIN",nullable=true)
     */
    protected $fechaefin;
    /**
     * @ORM\Column(type="date",name="FECHA_R_INICIO",nullable=true)
     */
    protected $fecharinicio;
    /**
     * @ORM\Column(type="date",name="FECHA_R_FIN",nullable=true)
     */
    protected $fecharfin;
    /**
     * @ORM\Column(type="string",name="ESTADO", length=12)
     */
    
    protected $estadoact;/**
     * @ORM\Column(type="string",name="PRIORIDAD", length=5,nullable=true)
     */
    protected $prioridadact;
    /**
     * @ORM\Column(type="integer",name="PESO",nullable=true)
     */ 
    
    protected $peso;
    /**
     * @ORM\Column(type="integer",name="PROGRESO",nullable=true)
     */ 
    
    protected $progresoact;
    
     /*Objeto unidad organica 1..m*/
    /**
     * @ORM\ManyToOne(targetEntity="solicitud")
     * @ORM\JoinColumn(name="SOLICITUD_ID_SOLICITUD", referencedColumnName="ID_SOLICITUD")
     */
    protected $solicitud;
    public function getIdactividad() {
        return $this->idactividad;
    }

    public function getTituloact() {
        return $this->tituloact;
    }

    public function getDescripcionact() {
        return $this->descripcionact;
    }

    public function getFechaeinicio() {
        return $this->fechaeinicio;
    }

    public function getFechaefin() {
        return $this->fechaefin;
    }

    public function getFecharinicio() {
        return $this->fecharinicio;
    }

    public function getFecharfin() {
        return $this->fecharfin;
    }

    public function getEstadoact() {
        return $this->estadoact;
    }

    public function getPrioridadact() {
        return $this->prioridadact;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getProgresoact() {
        return $this->progresoact;
    }

    public function getSolicitud() {
        return $this->solicitud;
    }

    public function setIdactividad($idactividad) {
        $this->idactividad = $idactividad;
    }

    public function setTituloact($tituloact) {
        $this->tituloact = $tituloact;
    }

    public function setDescripcionact($descripcionact) {
        $this->descripcionact = $descripcionact;
    }

    public function setFechaeinicio($fechaeinicio) {
        $this->fechaeinicio = $fechaeinicio;
    }

    public function setFechaefin($fechaefin) {
        $this->fechaefin = $fechaefin;
    }

    public function setFecharinicio($fecharinicio) {
        $this->fecharinicio = $fecharinicio;
    }

    public function setFecharfin($fecharfin) {
        $this->fecharfin = $fecharfin;
    }

    public function setEstadoact($estadoact) {
        $this->estadoact = $estadoact;
    }

    public function setPrioridadact($prioridadact) {
        $this->prioridadact = $prioridadact;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setProgresoact($progresoact) {
        $this->progresoact = $progresoact;
    }

    public function setSolicitud($solicitud) {
        $this->solicitud = $solicitud;
    }


}
