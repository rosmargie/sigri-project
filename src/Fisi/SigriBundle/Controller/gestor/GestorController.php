<?php

namespace Fisi\SigriBundle\Controller\gestor;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GestorController extends Controller
{
    public function MostrarBEGAction()
    {
        return $this->render('FisiSigriBundle:gestor:bandejaEntrGestor.html.twig');
    }
    
    
    
    
    
}
