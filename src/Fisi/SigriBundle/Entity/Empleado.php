<?php

namespace Fisi\SigriBundle\Entity;

use Fisi\SigriBundle\Entity\UnidadOrganica;
use Doctrine\ORM\Mapping as ORM;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author Usuario
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="empleado")
 */
class Empleado {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="ID_EMPLEADO")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $idempleado;

    /**
     * @ORM\Column(type="string",name="NOMBRE", length=25)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string",name="APELLIDO_PATERNO", length=25)
     */
    protected $apellidopaterno;

    /**
     * @ORM\Column(type="string",name="APELLIDO_MATERNO", length=25)
     */
    protected $apellidomaterno;

    /**
     * @ORM\Column(type="string",name="TELEFONO", length=9)
     */
    protected $telefono;

    /**
     * @ORM\Column(type="string",name="EMAIL", length=25)
     */
    protected $email;

    /**
     * @ORM\Column(type="string",name="DIRECCION", length=75)
     */
    protected $direccion;
/*Objeto unidad organica 1..m*/
    /**
     * @ORM\ManyToOne(targetEntity="UnidadOrganica")
     * @ORM\JoinColumn(name="UNIDAD_ORGANICA_ID_UNIDAD_ORGANICA", referencedColumnName="ID_UNIDAD_ORGANICA")
     */
    protected $unidadOrganica;
    public function getApellidopaterno() {
        return $this->apellidopaterno;
    }
    public function getApellidomaterno() {
        return $this->apellidomaterno;
    }

    public function setApellidomaterno($apellidomaterno) {
        $this->apellidomaterno = $apellidomaterno;
    }

        public function setApellidopaterno($apellidopaterno) {
        $this->apellidopaterno = $apellidopaterno;
    }

        public function getUnidadOrganica() {
        return $this->unidadOrganica;
    }

    public function setUnidadOrganica($unidadOrganica) {
        $this->unidadOrganica = $unidadOrganica;
    }

    public function getIdempleado() {
        return $this->idempleado;
    }

    public function setIdempleado($idempleado) {
        $this->idempleado = $idempleado;
    }

    
    public function getNombre() {
        return $this->nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDireccion() {
        return $this->direccion;
    }



    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }



    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

}
