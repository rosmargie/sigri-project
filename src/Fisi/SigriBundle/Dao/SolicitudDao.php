<?php

namespace Fisi\SigriBundle\Dao;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\Common\Collections\Criteria;

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

    /**
     * La solicitud es creada por el solicitante
     * @param type $solicitud
     */
    public function crearSolicitud($solicitud) {
        //se envia la entidad solicitud a la BD
        $this->entityManager->persist($solicitud);
        $this->entityManager->flush();
    }
    
    public function obtenerSolicitud($id){
        return $this->entityManager->find('FisiSigriBundle:Solicitud', $id);
    }
    
    /***
     * Se va consultar las solicitudes tanto del lado del solicitante
     * como del lado del gestor
     */
    public function obtenerSolicitudes($filtro, $empleado = null){
        $qb = $this->entityManager->createQueryBuilder();
        $qb->from('FisiSigriBundle:Solicitud', 's')
                    ->select('s');
        
        //si es que la llamada viene de un solicitante se agrega su ID para buscar solo sus solicitudes
        if ($empleado != null){
            /*consulta del empleado*/
             
            //query base con el id del empleado
            $qb->where($qb->expr()->eq('s.empleado', ':idempleado'))
                    ->setParameter('idempleado', $empleado->getIdempleado());
        }
        
        //si el estado existe (no es TODOS) se agrega a la query....todos=null)
        if ($filtro['estado'] != null){
            $qb->andWhere($qb->expr()->eq('s.estado', ':estado'))
                ->setParameter('estado', strtoupper($filtro['estado']));
        }
        //si existe una fecha de inicio en el filtro se agrega a la query
        if (array_key_exists('f_inicio', $filtro) && $filtro['f_inicio'] != null){
            $qb->andWhere($qb->expr()->gte('s.fechareporte', ':f_inicio'))
            ->setParameter(':f_inicio', $filtro['f_inicio']);
        }
        //si existe una fecha fin en el filtro se agrega a la query
        if (array_key_exists('f_fin', $filtro) && $filtro['f_fin'] != null){
            $qb->andWhere($qb->expr()->lte('s.fechareporte', ':f_fin'))
            ->setParameter(':f_fin', $filtro['f_fin']);
        }
        
        return $qb->getQuery()->getArrayResult();
    }
    
    /**
     * Se va consultar las cantidades tanto del lado del solicitante
     * como del lado del gestor
     * @param type $empleado
     */
    public function obtenerCantidadTipoSolicitudes($empleado = null){
        $cantEstados = array();
        //por cada tipo de estado buscar en la BD
        foreach (['PENDIENTE','PROCESO','FINALIZADO'] as $estado){
            $qb = $this->entityManager->createQueryBuilder();
            $qb->from('FisiSigriBundle:Solicitud', 's')
                        ->select('count(1)');

            //si es que la llamada viene de un solicitante se agrega su ID para buscar solo sus solicitudes
            if ($empleado != null){
                /*consulta del empleado*/

                //query base con el id del empleado
                $qb->where($qb->expr()->eq('s.empleado', ':idempleado'))
                        ->setParameter('idempleado', $empleado->getIdempleado());
            }
            
            $qb->andWhere($qb->expr()->eq('s.estado', ':estado'))
                ->setParameter('estado', $estado);
            
            //guardar la cantidad en el array
            $cantEstados[$estado] = $qb->getQuery()->getSingleScalarResult();
        }
        return $cantEstados;
    }
    
    public function actualizarCalificacion($id, $calificacion){
        //obtener la solicitud
        $solicitud = $this->obtenerSolicitud($id);
        //actualizar la calificacion
        $solicitud->setCalificacion(strtoupper($calificacion));
        //actualizar en la DB
        $this->entityManager->flush();
    }
    
    public function mostrarAllSolicitudes() {
        $solicitud = $this->entityManager->getRepository('FisiSigriBundle:Solicitud')->findAll();
        return $solicitud;
    }   
    
    /***
     * Se va consultar las solicitudes para el gestor
     */
    public function obtenerSolicitudesG($filtro, $empleado = null){
        $qb = $this->entityManager->createQueryBuilder();
        $qb->from('FisiSigriBundle:Solicitud', 's')
                    ->select('s');        
        //si es que la llamada viene de un solicitante se agrega su ID para buscar solo sus solicitudes
        if ($empleado != null){
            /*consulta del empleado*/
             
            //query base con el id del empleado
            $qb->where($qb->expr()->eq('s.empleado', ':idempleado'))
                    ->setParameter('idempleado', $empleado->getIdempleado());
        }        
        //si el estado existe (no es TODOS) se agrega a la query
        if ($filtro['estadoG'] != null){
            $qb->andWhere($qb->expr()->eq('s.estado', ':estadoG'))
                ->setParameter('estadoG', strtoupper($filtro['estadoG']));
        }
        //si la prioridad existe (no es TODOS) se agrega a la query
        if ($filtro['prioridadG'] != null){
            $qb->andWhere($qb->expr()->eq('s.prioridad', ':prioridadG'))
                ->setParameter('prioridadG', strtoupper($filtro['prioridadG']));
        }        
        //si existe una fecha de inicio en el filtro se agrega a la query
        if (array_key_exists('f_inicioG', $filtro) && $filtro['f_inicioG'] != null){
            $qb->andWhere($qb->expr()->gte('s.fecha_reporte', ':f_inicioG'))
            ->setParameter(':f_inicioG', $filtro['f_inicioG']);
        }
        //si existe una fecha fin en el filtro se agrega a la query
        if (array_key_exists('f_finG', $filtro) && $filtro['f_finG'] != null){
            $qb->andWhere($qb->expr()->lte('s.fecha_reporte', ':f_finG'))
            ->setParameter(':f_finG', $filtro['f_finG']);
        }
   
        
        
        return $qb->getQuery()->getArrayResult();
    }
    
    /*
     * Aqui se va a registrar la incidencia/Requerimiento es decir actualizar algunos campos de solicitud
     */
    public function registroIncReq($idSolicitud, $prioridad,$categoria , $subCategoria){        
        //obtener la solicitud
        $solicitud = $this->obtenerSolicitud($idSolicitud);
        //Actualizar prioridad
        $solicitud->setPrioridad(strtoupper($prioridad));
        //Actualizar categoria
        $solicitud->setCategoria($categoria);
        //Actualizar sub-categoria
        $solicitud->setSubcategoria($subCategoria);
        
        //actualizar en la DB
        $this->entityManager->flush();
    }

}
