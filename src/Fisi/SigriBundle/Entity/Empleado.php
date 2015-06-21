<?php

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

