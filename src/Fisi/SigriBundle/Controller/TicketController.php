<?php

namespace Fisi\SigriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Fisi\SigriBundle\Dao\EmpleadoDao;
use Fisi\SigriBundle\Form\MapperForm;
use Fisi\SigriBundle\Dao\SolicitudDao;
use Fisi\SigriBundle\Dao\CategoriaDao;

class TicketController extends Controller {

    public function indexAction() {
        return $this->render('FisiSigriBundle::index.html.twig');
    }

    public function menuPrincipalAction() {
        return $this->render('FisiSigriBundle:gestor:menuPrincipalGestor.html.twig');
    }

    public function bandejaEntradaGestorAction() {
        //obtener empleado

        $solicitudDao = new SolicitudDao;
        $solicitudesAll = $solicitudDao->mostrarAllSolicitudes();


        return $this->render('FisiSigriBundle:gestor:bandejaEntradaGestor.html.twig', compact("solicitudesAll"));
    }

    public function detalleSoliicitudGestorAction($idSolicitud) {
        $solicitudDao = new SolicitudDao;
        $solicitud = $solicitudDao->getSolicitud($idSolicitud);

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

}
