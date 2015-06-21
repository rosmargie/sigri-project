<?php

namespace Fisi\SigriBundle\Entity;

<<<<<<< HEAD
/**
 * Empleado
 */
class Empleado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellidoPaterno;

    /**
     * @var string
     */
    private $apellidoMaterno;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $direccion;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Empleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidoPaterno
     *
     * @param string $apellidoPaterno
     *
     * @return Empleado
     */
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;

        return $this;
    }

    /**
     * Get apellidoPaterno
     *
     * @return string
     */
    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    /**
     * Set apellidoMaterno
     *
     * @param string $apellidoMaterno
     *
     * @return Empleado
     */
    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;

        return $this;
    }

    /**
     * Get apellidoMaterno
     *
     * @return string
     */
    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Empleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Empleado
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Empleado
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
}

=======
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
    protected $id_empleado;

    /**
     * @ORM\Column(type="string",name="NOMBRE", length=25)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string",name="APELLIDO_PATERNO", length=25)
     */
    protected $apellido_paterno;

    /**
     * @ORM\Column(type="string",name="APELLIDO_MATERNO", length=25)
     */
    protected $apellido_materno;

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

    public function getUnidadOrganica() {
        return $this->unidadOrganica;
    }

    public function setUnidadOrganica($unidadOrganica) {
        $this->unidadOrganica = $unidadOrganica;
    }

    public function getId_empleado() {
        return $this->id_empleado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido_paterno() {
        return $this->apellido_paterno;
    }

    public function getApellido_materno() {
        return $this->apellido_materno;
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

    public function setId_empleado($id_empleado) {
        $this->id_empleado = $id_empleado;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido_paterno($apellido_paterno) {
        $this->apellido_paterno = $apellido_paterno;
    }

    public function setApellido_materno($apellido_materno) {
        $this->apellido_materno = $apellido_materno;
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
>>>>>>> master
