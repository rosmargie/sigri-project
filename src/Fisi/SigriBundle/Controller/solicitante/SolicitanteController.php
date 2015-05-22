<?php

namespace Fisi\SigriBundle\Controller\solicitante;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SolicitanteController extends Controller
{
    public function indexAction()
    {
        return $this->render('FisiSigriBundle:solicitante:consultar.html.twig');
    }
      public function solicitarAction()
    {
        return $this->render('FisiSigriBundle:solicitante:solicitar.html.twig');
    }
    
    
    
    
}
