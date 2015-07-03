<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Serializer;
use Fisi\SigriBundle\Dao\EmpleadoDao;
use Fisi\SigriBundle\Dao\UnidadOrganicaDao;
use Fisi\SigriBundle\Form\MapperForm;
use Fisi\SigriBundle\Dao\SolicitudDao;
use Fisi\SigriBundle\Dao\CategoriaDao;
use Fisi\SigriBundle\Form\ViewUtils;




class TicketController extends Controller {
      private function obtenerEmpleadoActual(){
        
        //obtener empleado
        $empleadoDao = new EmpleadoDao;
        $empleado=$empleadoDao->getEmpleado($this->getUser()->getIdEmpleado()); //Aca se tiene que modificar por el id del usuario actual
        return $empleado;
        
    }
    

    public function indexAction() {
        return $this->render('FisiSigriBundle::index.html.twig');
    }

    public function menuPrincipalAction() {
        return $this->render('FisiSigriBundle:gestor:menuPrincipalGestor.html.twig');
    }

    public function bandejaEntradaGestorAction(Request $request) {
        //obtiene el empleado actual
        $empleado = $this->obtenerEmpleadoActual();
        
        //obtener filtro del formulario
        if($request->getMethod() == 'POST'){
            $data = $request->request->all();
                   
        }else{
            //el estado por default PENDIENTE
            $data = array('estadoG' => 1, 'prioridadG' => 1, 'unidadOrganizaG' => 1);           
        }
        
        $unidadOrganicaDao  = new UnidadOrganicaDao;
        $listaUnidadesOrganicas = $unidadOrganicaDao->mostrarAllUnidadesOrganicas();
        
        //mapear el filtroForm a array
        $filtro = MapperForm::convertirFormAFiltroBASolicitud($data);
        
        //enviar el filtro al Dao y obtener los resultados
        $solicitudDao= new SolicitudDao;
        $solicitudes = $solicitudDao->obtenerSolicitudesG($filtro, $empleado);        
         //obtener las cantidades de las solicitudes por estado del empleado
        $cantEstado = $solicitudDao->obtenerCantidadTipoSolicitudes($empleado);
        //a la vista crearle el array de estado seleccionando el estado actual
        $listaEstados = ViewUtils::obtenerListaEstadosSolEspera($filtro['estadoG']);
        //a la vista crearle el array de estado seleccionando el estado actual
        $listaPrioridades = ViewUtils::obtenerListaPrioridades($filtro['prioridadG']);
        //se envia los el listado de solicitudes, cantidades, los filtros y la lista de estados a la vista
        return $this->render('FisiSigriBundle:gestor:bandejaEntradaGestor.html.twig', 
                array("solicitudes"=>$solicitudes, "cantEstado" => $cantEstado,
                "filtro" => $filtro, "estados" => $listaEstados, "prioridades" => $listaPrioridades,"unidadesOrganicas" => $listaUnidadesOrganicas));
    }
    
        public function detalleSoliicitudGestorAction($idSolicitud) {
        $solicitudDao = new SolicitudDao;
        $solicitud = $solicitudDao->obtenerSolicitud($idSolicitud);

        $categoriaDao = new CategoriaDao;
        $categorias = $categoriaDao->mostrarAllCategorias();
                
        $array = array(
            'solicitud' => $solicitud,
            'categorias' => $categorias
            
        );
        

        return $this->render('FisiSigriBundle:gestor:detalleSolicitud.html.twig', $array);
    }

   

    public function agregarFilaGestorAction() {
        $nroFila = $_POST['fila'];
        $arr = array(
            'nroFila' => $nroFila
        );

        return $this->render('FisiSigriBundle:gestor:agregarFilaActividad.html.twig', $arr);
    }

    public function agregarFilaRespGestorAction() {
        $nroFila = $_POST['fila'];
        $arr = array(
            'nroFila' => $nroFila
        );

        return $this->render('FisiSigriBundle:gestor:agregarFilaResp.html.twig', $arr);
    }

    public function bandejaAlertasGestorAction() {
        return $this->render('FisiSigriBundle:gestor:bandejaAlertasGestor.html.twig');
    }

    public function actividadesGestorAction() {
        return $this->render('FisiSigriBundle:gestor:actividadesGestor.html.twig');
    }

    public function seguimientoGestorAction() {
        return $this->render('FisiSigriBundle:gestor:seguimientoGestor.html.twig');
    }

    public function mantenimientoCatalogoGestorAction() {
        return $this->render('FisiSigriBundle:gestor:mantenimientoCatalogoGestor.html.twig');
    }

    public function registrarCategoriaVAction() {
        return $this->render('FisiSigriBundle:gestor:registrarCategoria.html.twig');
    }

    public function editarCategoriaVAction() {

        print_r("entro a edtar?");
        return $this->render('FisiSigriBundle:gestor:editarCategoria.html.twig');
    }

    public function eliminarCategoriaVAction() {
        return $this->render('FisiSigriBundle:gestor:eliminarCategoria.html.twig');
    }

    public function reportesGestorAction() {
        return $this->render('FisiSigriBundle:gestor:reportesGestor.html.twig');
    }

    public function mantenimientoPersonalAction() {
        return $this->render('FisiSigriBundle:gestor:mantenimientoPersonal.html.twig');
    }
    
    public function registrarInicReqAction(Request $request) {
        //los datos del registro
        $idSolicitud = $request->request->get("idSolicitud");
        $prioridad = $request->request->get("prioridad");
        $categoria = $request->request->get("categoria");
        $subCategoria = $request->request->get("subCategoria");
        
        $categoriDao = new CategoriaDao;
        $categoriaC = $categoriDao->buscarCategoriaNombre($categoria);
        //registra incidencia/ requerimiento -> actualizar solicitud
        $solicitudDao = new SolicitudDao();
        $solicitudDao->registroIncReq($idSolicitud, $prioridad,$categoriaC , $subCategoria);
        
        return new Response(json_encode(array("sct" => $subCategoria) ));
    }
    
    

}
