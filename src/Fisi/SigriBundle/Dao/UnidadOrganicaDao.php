<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Fisi\SigriBundle\Dao;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * Description of unidadOrganicaDao
 *
 * @author Lizeth pc
 */
class UnidadOrganicaDao extends BaseDao {

    public function mostrarAllUnidadesOrganicas() {
        $unidadesOrganicas = $this->entityManager->getRepository('FisiSigriBundle:UnidadOrganica')->findAll();
        return $unidadesOrganicas;
    }

}
