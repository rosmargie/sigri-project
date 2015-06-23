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
        $solicitud = new Solicitud();
        $solicitud->setTitulo($data['titulo']);
        $solicitud->setTipo($data['tipo_Sol']);
        $solicitud->setEstado($estado);
        
        $solicitud->setFecha_reporte(\DateTime::createFromFormat('d/m/Y', $data['fechareporte']));
        
        if($data['fechareserva'] != null ){
            $solicitud->setFecha_reserva(\DateTime::createFromFormat('d/m/Y',$data['fechareserva'] )); 
        }
        $solicitud->setHora_reporte(\DateTime::createFromFormat('g:i:s A', $data['horareporte'])); 
        
        
        $solicitud->setDescripcion($data['descripcion']);      
        $solicitud->setIp($ip);
        
        
        $solicitud->setEmpleado($empleado);
        return $solicitud;
    }
}
