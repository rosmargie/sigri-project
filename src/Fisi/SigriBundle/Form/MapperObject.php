<?php

namespace Fisi\SigriBundle\Form;
use Fisi\SigriBundle\Entity\Avance;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MapperObject
 *
 * @author Usuario
 */
class MapperObject {
    
     public static function convertiraAvance($actividad, $descripcion, $progreso){
       $avance = new Avance();
       
        $avance->setActividad($actividad);
       $avance->setDescripcionavc($descripcion);
       $avance->setProgresoavc($progreso);
       
       return $avance;
       
    }
}
