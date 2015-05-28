<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{     
    public function ConsultarSolicitateAction()
    {
        return $this->render('FisiSigriBundle:solicitante:consultar.html.twig');
    }
      public function SolicitarSolicitanteAction()
    {
        return $this->render('FisiSigriBundle:solicitante:solicitar.html.twig');
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
