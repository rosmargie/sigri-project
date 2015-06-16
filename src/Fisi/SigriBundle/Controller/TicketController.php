<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TicketController extends Controller
{
    public function indexAction()
    {
        return $this->render('FisiSigriBundle::index.html.twig');
    }
    
    public function menuPrincipalAction()
    {
        return $this->render('FisiSigriBundle:gestor:menuPrincipalGestor.html.twig');
    }
    public function bandejaEntradaGestorAction()
    {
        return $this->render('FisiSigriBundle:gestor:bandejaEntradaGestor.html.twig');
    }
    public function detalleSoliicitudGestorAction()
    {
        return $this->render('FisiSigriBundle:gestor:detalleSolicitud.html.twig');
    }
	 public function agregarFilaGestorAction()
    {
               $nroFila = $_POST['fila'];
               
               
        $arr = array(
            'nroFila' => $nroFila
            
        );
               
        return $this->render('FisiSigriBundle:gestor:agregarFilaActividad.html.twig',$arr);
    }

  
   	 public function agregarFilaRespGestorAction()
    {
               $nroFila = $_POST['fila'];
               
               
        $arr = array(
            'nroFila' => $nroFila
            
        );
               
        return $this->render('FisiSigriBundle:gestor:agregarFilaResp.html.twig',$arr);
    }

}
