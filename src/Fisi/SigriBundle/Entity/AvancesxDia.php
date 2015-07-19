<?php
namespace Fisi\SigriBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AvancesxDia
 *
 * @author Usuario
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="vw_avancesxdia")
 */
class AvancesxDia {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="date",name="FECHA",nullable=false)
     */
    protected $fecha;
    
    /**
     * @ORM\Column(type="integer",name="ID_ACTIVIDAD")
     */
    protected $idactividad;
    
    /**
     * @ORM\Column(type="integer",name="CANTIDAD")
     */
    protected $cantidad;
    
    public function getFecha() {
        return $this->fecha;
    }

    public function getIdactividad() {
        return $this->idactividad;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setIdactividad($idactividad) {
        $this->idactividad = $idactividad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    
    
    
}
