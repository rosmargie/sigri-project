<?php

namespace Fisi\SigriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fisi\SigriBundle\Entity\PersonalOTI;
use Fisi\SigriBundle\Entity\UnidadOrganica;
use Fisi\SigriBundle\Entity\Rol;
use Symfony\Component\Security\Core\User\UserInterface;

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
class Empleado implements UserInterface, \Serializable {

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

    /**
     * @ORM\OneToOne(targetEntity="PersonalOTI", mappedBy="empleado", cascade={"persist"})
     **/
    private $personaloti;
    
    /**
    * @ORM\Column(name="USERNAME", type="string")
    */
    protected $username;
 
    /**
     * @ORM\Column(name="PASSWORD", type="string")
     */
    protected $password;
 
    /**
     * @ORM\Column(name="SALT", type="string")
     */
    protected $salt;
    
    /**
     * se utilizó user_roles para no hacer conflicto al aplicar ->toArray en getRoles()
     * @ORM\ManyToMany(targetEntity="Rol")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="ID_EMPLEADO")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     */
    protected $user_roles;
    
    public function __construct()
    {
        $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function getPersonaloti() {
        return $this->personaloti;
    }

    public function setPersonaloti($personaloti) {
        $this->personaloti = $personaloti;
    }
 
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
    
    public function getEmpleado(){
        return $this->getNombre();
    }
    public function __toString(){
        return $this->getEmpleado();
    }
    
    public function equals(UserInterface $user) {
        return md5($this->getUsername()) == md5($user->getUsername());
    }
    public function getUserRoles() {
        return $this->user_roles;
    }

    public function setUserRoles($user_roles) {
        $this->user_roles = $user_roles;
    }

    /**
     * Erases the user credentials.
     */
    public function eraseCredentials() {
 
    }
    
    public function addRole(Rol $userRoles)
    {
        $this->user_roles[] = $userRoles;
    }

    public function getRoles() {
        return $this->user_roles->toArray();
    }

    public function serialize() {
        return serialize(array( $this->idempleado ));
    }

    public function unserialize($serialized) {
        list( $this->idempleado, ) = unserialize($serialized);
    }

}
