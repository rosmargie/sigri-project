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
 * Description of PersonalOTIDao
 *
 * @author Usuario
 */
class PersonalOTIDao extends BaseDao {
    
     public function getpersonalOTI($empleado){
         
         
        $personalOti = $this->entityManager->find("FisiSigriBundle:PersonalOTI",$empleado->getIdempleado());
        return $personalOti;
        
    }
}
