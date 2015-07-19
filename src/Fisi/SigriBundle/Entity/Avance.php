<?php
namespace Fisi\SigriBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Avance
 *
 * @author Usuario
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="avance")
 */

class Avance {
    
    public function __construct() {
        $this->setFechaavance( new \DateTime());
    }
    
 /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="ID_AVANCE")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
     protected $idavance;
  /**
     * @ORM\Column(type="datetime",name="FECHA_AVANCE",nullable=true)
     */
    protected $fechaavance;
     /**
     * @ORM\Column(type="string",name="DESCRIPCION", length=250,nullable=false)
     */
    protected $descripcionavc;
     /**
     * @ORM\Column(type="integer",name="PROGRESO",nullable=false)
     */ 
    
    protected $progresoavc;
       
    /**
     * @ORM\ManyToOne(targetEntity="Actividad")
     * @ORM\JoinColumn(name="ACTIVIDAD_ID_ACTIVIDAD", referencedColumnName="ID_ACTIVIDAD")
     */
    protected $actividad;
    public function getIdavance() {
        return $this->idavance;
    }
    public function getActividad() {
        return $this->actividad;
    }

    public function setActividad($actividad) {
        $this->actividad = $actividad;
    }

        public function getFechaavance() {
        return $this->fechaavance;
    }

    public function getDescripcionavc() {
        return $this->descripcionavc;
    }

    public function getProgresoavc() {
        return $this->progresoavc;
    }

 

    public function setIdavance($idavance) {
        $this->idavance = $idavance;
    }

    public function setFechaavance($fechaavance) {
        $this->fechaavance = $fechaavance;
    }

    public function setDescripcionavc($descripcionavc) {
        $this->descripcionavc = $descripcionavc;
    }

    public function setProgresoavc($progresoavc) {
        $this->progresoavc = $progresoavc;
    }

  


}
