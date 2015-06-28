<?php

namespace Fisi\SigriBundle\Util;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserUtil
 *
 * @author Usuario
 */
class UserUtil {
    public static function esUnicamenteRol($rolNombre, $roles){
        $esRol = false;
        foreach($roles as $rol) {
            if ($rolNombre == $rol->getName()) {
                $esRol = true;
                break;
            }
        }
        
        if($rolNombre == "ROLE_EMPLEADO"){
            if( $esRol && count($roles) == 1 ){
                return true;
            }
        }else{
            if( $esRol && count($roles) == 2 ){
                return true;
            }
        } 
                
        return false;
    }
}
