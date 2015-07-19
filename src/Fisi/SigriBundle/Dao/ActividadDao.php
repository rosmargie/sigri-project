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
 * Description of Actividad
 *
 * @author Usuario
 */
class ActividadDao extends BaseDao {

    public function getActividad($id) {
        $actividad = $this->entityManager->find("FisiSigriBundle:Actividad", $id);
        return $actividad;
    }

    public function obtenerActividadesPersonaloti($filtro, $personaloti = null) {

        $qb = $this->entityManager->createQueryBuilder();
        $qb->from('FisiSigriBundle:Actividad', 's')
                ->join('s.solicitud', 'so')
                ->join('so.empleado', 'e')
                ->select('s','so', 'e');

        //si es que la llamada viene de un solicitante se agrega su ID para buscar solo sus solicitudes
        if ($personaloti != null) {
            /* consulta del empleado */

            //query base con el id del empleado
            $qb->where($qb->expr()->eq('s.personaloti', ':idpersonaloti'))
                    ->setParameter('idpersonaloti', $personaloti->getIdpersonaloti());
        }

        //si el prioridad existe (no es TODOS) se agrega a la query....todos=null)
        if ($filtro['prioridad'] != null) {
          
            $qb->andWhere($qb->expr()->eq('s.prioridadact', ':prioridad'))
                    ->setParameter('prioridad', strtoupper($filtro['prioridad']));
        }
        //si existe una fecha de inicio en el filtro se agrega a la query
        if (array_key_exists('f_inicio', $filtro) && $filtro['f_inicio'] != null) {
            $qb->andWhere($qb->expr()->gte('s.fechareporte', ':f_inicio'))
                    ->setParameter(':f_inicio', $filtro['f_inicio']);
        }
        //si existe una fecha fin en el filtro se agrega a la query
        if (array_key_exists('f_fin', $filtro) && $filtro['f_fin'] != null) {
            $qb->andWhere($qb->expr()->lte('s.fechareporte', ':f_fin'))
                    ->setParameter(':f_fin', $filtro['f_fin']);
        }

        return $qb->getQuery()->getArrayResult();
    }
    
    
        /**
     * Se va consultar las cantidades tanto del lado del actividades
     * como del lado del gestor
     * @param type $empleado
     */
    public function obtenerCantidadTipoActividades($personaloti = null){
        $cantPrioridad = array();
        //por cada tipo de estado buscar en la BD
        foreach (['ALTA','MEDIA','BAJA'] as $prioridad){
            $qb = $this->entityManager->createQueryBuilder();
            $qb->from('FisiSigriBundle:Actividad', 's')
                        ->select('count(1)');

            //si es que la llamada viene de un solicitante se agrega su ID para buscar solo sus solicitudes
            if ($personaloti != null){
                /*consulta del empleado*/

                //query base con el id del empleado
                $qb->where($qb->expr()->eq('s.personaloti', ':idpersonaloti'))
                        ->setParameter('idpersonaloti',$personaloti->getIdpersonaloti());
            }
            
            $qb->andWhere($qb->expr()->eq('s.prioridadact', ':prioridad'))
                ->setParameter('prioridad', $prioridad);
            
            //guardar la cantidad en el array
            $cantPrioridad[$prioridad] = $qb->getQuery()->getSingleScalarResult();
        }
        return $cantPrioridad;
    }
    public function obtenerListaAvances($idactividad){
        $qb = $this->entityManager->createQueryBuilder();
        $qb->from('FisiSigriBundle:Avance', 'a')
                    ->select('a');
        
         $qb->where($qb->expr()->eq('a.actividad', ':idactividad'))
                    ->setParameter('idactividad',$idactividad);
         
        return $qb->getQuery()->getArrayResult();
        
    }
    public function guardarAvance($avance){
        
       $this->entityManager->persist($avance);
       $this->entityManager->flush();
        
    } 
    public function ActualizarFechaInicioActividad($idactividad){
        
        $actividad =  $this->getActividad($idactividad);
        $actividad->setFecharinicio(new \DateTime());
        $actividad->setEstadoact("PROCESO");
        $this->entityManager->flush(); 
    }
    public function ActualizarFechaFinActividad($idactividad){
        $actividad =  $this->getActividad($idactividad);
        $actividad->setFecharfin(new \DateTime());
        $actividad->setEstadoact("FINALIZADO");
        $this->entityManager->flush(); 
    }
    
    public function GenerarReporte($idactividad){
        $qb = $this->entityManager->createQueryBuilder();
        $qb->from('FisiSigriBundle:AvancesxDia', 'a')
                    ->select('a');
        
        $qb->where($qb->expr()->eq('a.idactividad', ':idactividad'))
                    ->setParameter('idactividad',$idactividad);
         
        return $qb->getQuery()->getArrayResult();
    }
}
