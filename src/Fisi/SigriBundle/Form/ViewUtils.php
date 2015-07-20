<?php

namespace Fisi\SigriBundle\Form;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewUtils
 *
 * @author Usuario
 */
class ViewUtils {
    
    public static function obtenerListaEstados($estadoActual){
        $listaEstados = array();
        $estados = array(array("Todas",""), array("Pendiente",1), 
            array("Proceso", 2), array("Finalizado",3));
        foreach ($estados as $estado){
            $os = new OptionSelect();
            $os->etiqueta = $estado[0];
            $os->valor = $estado[1];
            if ($estadoActual == strtoupper($estado[0])){
                $os->seleccionado = true;
            }else{
                $os->seleccionado = false;
            }
            array_push($listaEstados, $os);
        }
        return $listaEstados;
    }      
    
    public static function obtenerCalificacion($idCalificacion){
        if ($idCalificacion == 1){
            return "MALO";
        }elseif ($idCalificacion == 2){
            return "REGULAR";
        }elseif( $idCalificacion == 3){
            return "EXCELENTE";
        }
    }
    

     public static function obtenerListaEstadosSolEspera($estadoActual){

        $listaEstados = array();
        $estados = array(array("Todas",""), array("Pendiente",1), 
            array("Proceso", 2));
        foreach ($estados as $estado){
            $os = new OptionSelect();
            $os->etiqueta = $estado[0];
            $os->valor = $estado[1];
            if ($estadoActual == strtoupper($estado[0])){
                $os->seleccionado = true;
            }else{
                $os->seleccionado = false;
            }
            array_push($listaEstados, $os);
        }
        return $listaEstados;
    }
    
    public static function obtenerListaPrioridades($prioridadActual){
        $listaPrioridades = array();
        $prioridades = array(array("Todas",""), array("Alta",1),array("Media",2),                             array("Baja",3),
                             array("Sin asignar",4)            
        );
        foreach ($prioridades as $prioridad){
            $os = new OptionSelect();
            $os->etiqueta = $prioridad[0];
            $os->valor = $prioridad[1];
            if($prioridadActual == strtoupper($prioridad[0])){
                $os->seleccionado = true;
            }else{
                $os->seleccionado = false;
            }
            array_push($listaPrioridades, $os);
        }
        return $listaPrioridades;
    }
    
    public static function obtenerListaPriorizar($prioridadActual){
        $listaPrioridades = array();
        $prioridades = array(array("------Seleccionar-------",0),array("Alta",1),array("Media",2),
                            array("Baja",3)            
        );
        foreach ($prioridades as $prioridad){
            $os = new OptionSelect();
            $os->etiqueta = $prioridad[0];
            $os->valor = $prioridad[1];
            if($prioridadActual == strtoupper($prioridad[0])){
                $os->seleccionado = true;
            }else{
                $os->seleccionado = false;
            }
            array_push($listaPrioridades, $os);           
        }
        return $listaPrioridades;
    }
    
}
