<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Fisi\SigriBundle\Dao\EmpleadoDao;
use Fisi\SigriBundle\Form\MapperForm;
use Fisi\SigriBundle\Dao\SolicitudDao;

class UserController extends Controller
{     
    public function SolicitudesSolicitanteAction()
    {
        return $this->render('FisiSigriBundle:solicitante:solicitudessolicitante.html.twig');
    }
     
    public function SolicitarSolicitanteAction(Request $request)
    {       //obtener empleado
            $empleadoDao = new EmpleadoDao;
            $empleado=$empleadoDao->getEmpleado(1);
            
          if ( $request->getMethod() == 'POST'){
            //obtiene la informacion del formulario
            $data = $request->request->all();
            //obtener ip
            $ip= $request->getClientIp();
            //mapea el formulario a la entidad
            $solicitud = MapperForm::convertirFormANuevaSolicitud($data,'PENDIENTE', $empleado, $ip);
            //enviar al dao
            $solicitudDao= new SolicitudDao;
            $solicitudDao->crearSolicitud($solicitud);
            //redirecciona a la lista de solicitudes
            return $this->redirectToRoute('solicitudes_usuario');
          }

        return $this->render('FisiSigriBundle:solicitante:solicitar.html.twig',array("empleado"=>$empleado->getNombre()));
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
