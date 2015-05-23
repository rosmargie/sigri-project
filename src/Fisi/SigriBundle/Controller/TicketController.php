<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TicketController extends Controller
{
    public function indexAction()
    {
        return $this->render('FisiSigriBundle::index.html.twig');
    }
    
   
}
