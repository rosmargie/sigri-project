<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fisi\SigriBundle\Dao\EmpleadoDao;


class UserController extends Controller
{     
    public function SolicitudesSolicitanteAction()
    {
        return $this->render('FisiSigriBundle:solicitante:solicitudessolicitante.html.twig');
    }
     public function CrearSolicitudAction()
    {
       
    }
    public function NotificacionesSolicitateAction()
    {
        return $this->render('FisiSigriBundle:solicitante:notificaciones.html.twig');
    }
      public function SolicitarSolicitanteAction()
    {
          //obtener empleado
          $empleadoDao = new EmpleadoDao;
          $empleado=$empleadoDao->getEmpleado(1);
          //crear solicitud
          
          
          
        return $this->render('FisiSigriBundle:solicitante:solicitar.html.twig',array("empleado"=>$empleado));
    }
    
   public function MostrarBEPAction()
    {
        return $this->render('FisiSigriBundle:personal:bandejaEntrPersonal.html.twig');
    }
    
    public function MostrarBEGAction()
    {
        return $this->render('FisiSigriBundle:gestor:bandejaEntrGestor.html.twig');
    }
    
     public function GestionarActividadAction()
    {
        return $this->render('FisiSigriBundle:personal:gestionActividad.html.twig');
    }
    
   
    
    
    
   
}
