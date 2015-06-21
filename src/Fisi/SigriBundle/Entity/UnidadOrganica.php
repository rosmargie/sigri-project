<?php
namespace Fisi\SigriBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of unidadOrganica
 *
 * @author Usuario
 */


/**
 * @ORM\Entity
 * @ORM\Table(name="unidad_organica")
 */
class UnidadOrganica {
    
     /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="ID_UNIDAD_ORGANICA")
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $id;
    /**
     * @ORM\Column(type="string",name="NOMBRE_UNIDAD", length=50)
     */
    protected $nombre;
    /**
     * @ORM\Column(type="integer",name="ANEXO")
     */
    protected $anexo;
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getAnexo() {
        return $this->anexo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setAnexo($anexo) {
        $this->anexo = $anexo;
    }


}
