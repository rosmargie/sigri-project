<?php
namespace Fisi\SigriBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author Usuario
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="categoria")
 */
class Categoria {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="ID_CATEGORIA")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $idcategoria;
     /**
     * @ORM\Column(type="string",name="NOMBRE_CATEGORIA", length=25 ,nullable=true)
     */
    protected $nombrecategoria;
     /**
     * @ORM\Column(type="string",name="DESCRIPCION_CATEGORIA", length=50)
     */ 
    protected $descripcioncategoria;
    
   
    public function getIdcategoria() {
        return $this->idcategoria;

    }

    public function getNombrecategoria() {
        return $this->nombrecategoria;
    }

    public function getDescripcioncategoria() {
        return $this->descripcioncategoria;
    }

    public function setIdcategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }

    public function setNombrecategoria($nombrecategoria) {
        $this->nombrecategoria = $nombrecategoria;
    }

    public function setDescripcioncategoria($descripcioncategoria) {
        $this->descripcioncategoria = $descripcioncategoria;
    }



}
