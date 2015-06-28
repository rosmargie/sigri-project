<?php
namespace Fisi\SigriBundle\Entity;



use Fisi\SigriBundle\Entity\Empleado;
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonalOTI
 *
 * @author Usuario
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="personal_oti")
 */
class PersonalOTI {
/**
     * @ORM\Id
     * @ORM\Column(type="integer", name="ID_PERSONAL_OTI")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $idpersonaloti;
    /**
     * @ORM\Column(type="string",name="CARGO", length=50)
     */
    protected $cargo;
    /**
     * @ORM\Column(type="string",name="JEFE_SUPERIOR", length=100)
     */
    protected $jefesuperior;
  
    /*Objeto empleado 0..1*/
    /**
     * @ORM\OneToOne(targetEntity="Empleado", inversedBy="personaloti")
     * @ORM\JoinColumn(name="EMPLEADO_ID_EMPLEADO", referencedColumnName="ID_EMPLEADO", onDelete="CASCADE", nullable=false)
     */
    protected $empleado;
    public function getIdpersonaloti() {
        return $this->idpersonaloti;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getJefesuperior() {
        return $this->jefesuperior;
    }

    public function getEmpleado() {
        return $this->empleado;
    }

    public function setIdpersonaloti($idpersonaloti) {
        $this->idpersonaloti = $idpersonaloti;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setJefesuperior($jefesuperior) {
        $this->jefesuperior = $jefesuperior;
    }

    public function setEmpleado(Empleado $empleado) {        
        $this->empleado = $empleado;
        $empleado->setPersonaloti($this);
    }

}
