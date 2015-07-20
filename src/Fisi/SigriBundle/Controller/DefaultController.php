<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Fisi\SigriBundle\Util\UserUtil;

class DefaultController extends Controller
{
    /**
     * Controlador inicial despues del login
     * @return type
     */
    public function indexAction()
    {
        //Dependiendo del rol del usuario realizar cambios
        $empleado = $this->getUser();
        if( UserUtil::esUnicamenteRol("ROLE_EMPLEADO", $empleado->getRoles()) ){
            return $this->redirect($this->generateUrl('solicitudes_usuario'));
        }else if(UserUtil::esUnicamenteRol("ROLE_PERSONALOTI", $empleado->getRoles())){
            return $this->redirect($this->generateUrl('bandeja_entrada_personal'));
        }
        
        //Si es Gestor se muestra el menu de opciones
        return $this->render('FisiSigriBundle::index.html.twig');
    }
    
    public function loginAction()
    {
        
        $request = $this->getRequest();
        $session = $request->getSession();
        // obtiene el error de inicio de sesión si lo hay
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('FisiSigriBundle:Default:login.html.twig', array(
            // el último nombre de usuario ingresado por el usuario
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }
    
    public function AdminMenuAction(){
        return $this->render('FisiSigriBundle:Crud:index.html.twig', array());
    }
    
    
   
}
