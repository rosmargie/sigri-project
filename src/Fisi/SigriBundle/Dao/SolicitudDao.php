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
class SolicitudDao extends BaseDao {
    
public function crearSolicitud($solicitud){
    
    $this->entityManager->persist($solicitud);
    $this->entityManager->flush();
}
}
