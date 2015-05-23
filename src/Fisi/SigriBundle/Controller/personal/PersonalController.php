<?php

namespace Fisi\SigriBundle\Controller\analista;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnalistaController extends Controller
{
    public function MostrarBEAAction()
    {
        return $this->render('FisiSigriBundle:analista:bandejaEntrAnalista.html.twig');
    }
    
    
    
    
    
}
