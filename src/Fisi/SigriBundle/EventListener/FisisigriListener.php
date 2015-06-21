<?php

namespace Fisi\SigriBundle\EventListener;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FisisigriListiner
 *
 * @author Usuario
 */
class FisisigriListener {
    static $container;

    // knock out the parent::onKernelRequest function that we don't want
    public function onKernelRequest($event){
        return;
    }   

    public function __construct($container){
        self::$container = $container;
    }

    static function twig(){
        return self::$container->get('twig');
    }

    static function entityManager(){
        return self::$container->get('doctrine')->getEntityManager();
    }

    static function entityManagerConnection(){
        $entityManager = self::$container->get('doctrine')->getEntityManager();
        return $entityManager->getConnection();
    }

}
