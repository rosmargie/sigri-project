<?php
namespace Fisi\SigriBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rol
 *
 * @author Usuario
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="rol")
 */
class Rol  implements RoleInterface {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
    /**
     * @ORM\Column(name="nombre", type="string")
     */
    protected $name;
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getRole() {
        return $this->getName();
    }
    
    public function __toString() {
        return $this->getRole();
    }

}
