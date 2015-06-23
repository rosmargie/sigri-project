<?php

namespace Fisi\SigriBundle\Dao;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SolicitudDao
 *
 * @author Usuario
 */
class CategoriaDao extends BaseDao {

    public function getCategoria($id) {
        $categoria = $this->entityManager->find("FisiSigriBundle:Categoria", $id);
        return $categoria;
    }
    
    public function buscarCategoriaNombre($nombre) {        
         $categoria = $this->entityManager->getRepository('FisiSigriBundle:Categoria')->findOneByNombre_categoria($nombre);         
        return $categoria;
    }
    

    public function mostrarAllCategorias() {
        $categorias = $this->entityManager->getRepository('FisiSigriBundle:Categoria')->findAll();

        return $categorias;
    }

}
