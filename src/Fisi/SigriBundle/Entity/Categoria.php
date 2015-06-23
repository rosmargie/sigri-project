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
    protected $id_categoria;
     /**
     * @ORM\Column(type="string",name="NOMBRE_CATEGORIA", length=25)
     */
    protected $nombre_categoria;
     /**
     * @ORM\Column(type="string",name="DESCRIPCION_CATEGORIA", length=50)
     */ 
    protected $descripcion_categoria;

    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function getNombre_categoria() {
        return $this->nombre_categoria;
    }

    public function getDescripcion_categoria() {
        return $this->descripcion_categoria;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function setNombre_categoria($nombre_categoria) {
        $this->nombre_categoria = $nombre_categoria;
    }

    public function setDescripcion_categoria($descripcion_categoria) {
        $this->descripcion_categoria = $descripcion_categoria;
    }


}
