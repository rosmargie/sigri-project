<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Serializer;
use Fisi\SigriBundle\Dao\EmpleadoDao;
use Fisi\SigriBundle\Form\MapperForm;
use Fisi\SigriBundle\Form\ViewUtils;
use Fisi\SigriBundle\Dao\SolicitudDao;

class UserController extends Controller
{     
    private function obtenerEmpleadoActual(){
        //obtener empleado
        $empleadoDao = new EmpleadoDao;
        $empleado=$empleadoDao->getEmpleado(11); //Aca se tiene que modificar por el id del usuario actual
        return $empleado;
    }
    
    public function SolicitudesSolicitanteAction(Request $request)
    {
        //obtiene el empleado actual
        $empleado = $this->obtenerEmpleadoActual();
        //obtener filtro del formulario
        if ( $request->getMethod() == 'POST'){
            //obtiene la informacion del formulario
            $data = $request->request->all();            
        }else{
            //el estado por default PENDIENTE
            $data = array('estado' => 1);
        }
        //mapear filtroForm a array
        $filtro = MapperForm::convertirFormAFiltroSolicitud($data);
        //enviar el filtro al Dao y obtener los resultados
        $solicitudDao= new SolicitudDao;
        $solicitudes = $solicitudDao->obtenerSolicitudes($filtro, $empleado);
        //obtener las cantidades de las solicitudes por estado del empleado
        $cantEstado = $solicitudDao->obtenerCantidadTipoSolicitudes($empleado);
        //a la vista crearle el array de estado seleccionando el estado actual
        $listaEstados = ViewUtils::obtenerListaEstados($filtro['estado']);
        //se envia los el listado de solicitudes, cantidades, los filtros y la lista de estados a la vista
        return $this->render('FisiSigriBundle:solicitante:solicitudessolicitante.html.twig', 
                array("solicitudes"=>$solicitudes, "cantEstado" => $cantEstado,
                "filtro" => $filtro, "estados" => $listaEstados));
    }
     
    public function SolicitarSolicitanteAction(Request $request)
{       //obtiene el empleado actual
        $empleado = $this->obtenerEmpleadoActual();
            
        if ( $request->getMethod() == 'POST'){
            //obtiene la informacion del formulario
            $data = $request->request->all();
            //obtener ip
            $ip= $request->getClientIp();
            //mapea el formulario a la entidad
            $solicitud = MapperForm::convertirFormANuevaSolicitud($data,'PENDIENTE', $empleado, $ip);
            //enviar al dao y crear solicitud
            $solicitudDao= new SolicitudDao;
            $solicitudDao->crearSolicitud($solicitud);
            //redirecciona a la lista de solicitudes
            return $this->redirectToRoute('solicitudes_usuario');
        }
        return $this->render('FisiSigriBundle:solicitante:solicitar.html.twig',array("empleado"=>$empleado));
    }
    
    public function SolicitudAction(Request $request){
        //obtener la id de la solicitud
        $idsolicitud = $request->request->get("id");
        //obtener la solicitud
        $solicitudDao= new SolicitudDao;
        $solicitud = $solicitudDao->obtenerSolicitud($idsolicitud);
        //convertir la solicitud a json para enviarlo al metodo ajax
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($solicitud, 'json');
        //responder la peticion con un jsonobject
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    public function SolicitudCalificarAction(Request $request){
        //obtener la id de la solicitud y la calificacion
        $idsolicitud = $request->request->get("id");
        $calificacion = ViewUtils::obtenerCalificacion($request->request->get("cal"));
        //Actualizar la calificacion
        $solicitudDao= new SolicitudDao;
        $solicitudDao->actualizarCalificacion($idsolicitud, $calificacion);
        return new Response(json_encode(array("asd" => $calificacion) ));
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
