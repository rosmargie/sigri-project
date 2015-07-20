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

    /**
     * La solicitud es creada por el solicitante
     * @param type $categoria
     */
    public function crearCategoria($categoria) {
        //se envia la entidad solicitud a la BD
        $this->entityManager->persist($categoria);
        $this->entityManager->flush();
    }

    public function actualizarCategoriaE($data) {

        $categoria = $this->getCategoria($data['idCategoriaR']);
        //actualizar la calificacion
        $categoria->setNombrecategoria(strtoupper($data['nombreCategoriaR']));
        $categoria->setDescripcioncategoria(strtoupper($data['descripcionCategoriaR']));

        //actualizar en la DB
        $this->entityManager->flush();
    }

    public function getCategoria($id) {
        $categoria = $this->entityManager->find("FisiSigriBundle:Categoria", $id);
        return $categoria;
    }
	

    public function buscarCategoriaNombre($nombre) {
        $categoria = $this->entityManager->getRepository('FisiSigriBundle:Categoria')->findOneBy(array('nombrecategoria' => $nombre));
        return $categoria;
    }

    public function mostrarAllCategorias() {
        $categorias = $this->entityManager->getRepository('FisiSigriBundle:Categoria')->findAll();

        return $categorias;
    }
	
	  public function eliminarCategoriaE($data) {
		//obtener el id de la categoria
        $categoria = $this->getCategoria($data['idCategoriaRE']);
        //eliminar categoria
		$this->entityManager->remove($categoria);
		$this->entityManager->flush();
        
    }

}
