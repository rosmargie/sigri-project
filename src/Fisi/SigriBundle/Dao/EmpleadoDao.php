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
 * Description of EmpleadoDao
 *
 * @author Usuario
 */
class EmpleadoDao extends BaseDao{
        
    public function getEmpleado($id){
        $empleado = $this->entityManager->find("FisiSigriBundle:Empleado",2);
        return $empleado->getUnidadOrganica()->getNombre();
        
    }
}
