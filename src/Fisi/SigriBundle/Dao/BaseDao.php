<?php

namespace Fisi\SigriBundle\Dao;
use Fisi\SigriBundle\EventListener\FisisigriListener;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseDao
 *
 * @author Usuario
 */
class BaseDao {
    public function __construct(){
        $this->entityManager = FisisigriListener::entityManager();
    }
}
