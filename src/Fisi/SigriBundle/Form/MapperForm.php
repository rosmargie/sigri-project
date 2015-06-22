<?php

namespace Fisi\SigriBundle\Form;
use Fisi\SigriBundle\Entity\Solicitud;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mapper
 *
 * @author Usuario
 */
class MapperForm {
    
    public static function convertirFormANuevaSolicitud($data, $estado, $empleado,$ip){
        //se crea la entidad solicitud
        $solicitud = new Solicitud();
        //se agregan los valores de los atributos
        $solicitud->setTitulo($data['titulo']);
        $solicitud->setTipo($data['tipo_Sol']);
        $solicitud->setEstado($estado);
        //en las fechas se convierten los textos en objetos DateTime
        $fechaActual = new \DateTime();
        $solicitud->setFecha_reporte(\DateTime::createFromFormat('d/m/Y', $fechaActual->format('d/m/Y')));
        //en caso de que fecha reserva sea diferente de null recien se crea el objeto DateTime
        if($data['fechareserva'] != null ){
            $solicitud->setFecha_reserva(\DateTime::createFromFormat('d/m/Y',$data['fechareserva'] )); 
        }
        $solicitud->setHora_reporte(\DateTime::createFromFormat('g:i:s A', $fechaActual->format('g:i:s A')));        
        $solicitud->setDescripcion($data['descripcion']);      
        $solicitud->setIp($ip);
        $solicitud->setEmpleado($empleado);
        return $solicitud;
    }
    
    public static function convertirFormAFiltroSolicitud($data){
        $filtro = array();
        //Se convierte la fecha inicio en texto a un objeto tipo DateTime
        if(array_key_exists('f_inicio',$data) &&  ["f_inicio"] != null){
            $filtro["f_inicio"] = \DateTime::createFromFormat('d/m/Y', 
                    $data["f_inicio"]);
        }else{
            $filtro["f_inicio"] = null;
        }         
        //Se convierte la fecha fin en texto a un objeto tipo DateTime
        if(array_key_exists('f_fin',$data) && $data["f_fin"] != null){
            $filtro["f_fin"] = \DateTime::createFromFormat('d/m/Y', 
                    $data["f_fin"]);
        }else{
            $filtro["f_fin"] = null;
        }   
        //Los valores del estado de la interfaz son numericos, aqui se crea el 
        //equivalente textual
        if ($data["estado"] == null){
            $filtro["estado"] = null;
        }else{
            if($data["estado"] == 1){
                $filtro["estado"] = "PENDIENTE";
            }elseif($data["estado"] == 2){
                $filtro["estado"] = "PROCESO";
            }elseif($data["estado"] == 3){
                $filtro["estado"] = "FINALIZADO";
            }
        }
        return $filtro;
    }
}
