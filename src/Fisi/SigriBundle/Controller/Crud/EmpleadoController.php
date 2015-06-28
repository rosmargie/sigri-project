<?php

namespace Fisi\SigriBundle\Controller\Crud;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fisi\SigriBundle\Entity\Empleado;
use Fisi\SigriBundle\Entity\PersonalOTI;
use Fisi\SigriBundle\Form\EmpleadoType;

/**
 * Empleado controller.
 *
 */
class EmpleadoController extends Controller
{

    /**
     * Lists all Empleado entities.
     *
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FisiSigriBundle:Empleado')->findAll();

        return $this->render('FisiSigriBundle:Crud\Empleado:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Empleado entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Empleado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->setSecurePassword($entity);
             
            $em = $this->getDoctrine()->getManager();
            
            $personaloti = null;
            if($entity->getPersonaloti() <> null){
                $personaloti = new PersonalOTI();
                $personaloti->setCargo($entity->getPersonaloti()->getCargo());
                $personaloti->setJefesuperior($entity->getPersonaloti()->
                        getJefesuperior());                
                $entity->setPersonaloti(null);
            }
            
            $em->persist($entity);
            $em->flush();
            
            if($personaloti <> null){
                $personaloti->setEmpleado($entity);
                $em->persist($personaloti);
                $em->flush();
            }
            
            return $this->redirect($this->generateUrl('admin_empleado_show', array('id' => $entity->getIdempleado())));
        }

        return $this->render('FisiSigriBundle:Crud\Empleado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Empleado entity.
     *
     * @param Empleado $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Empleado $entity)
    {
        $form = $this->createForm(new EmpleadoType(), $entity, array(
            'action' => $this->generateUrl('admin_empleado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Empleado entity.
     *
     */
    public function newAction()
    {
        $entity = new Empleado();
        $form   = $this->createCreateForm($entity);

        return $this->render('FisiSigriBundle:Crud\Empleado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Empleado entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FisiSigriBundle:Crud\Empleado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Empleado entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FisiSigriBundle:Crud\Empleado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Empleado entity.
    *
    * @param Empleado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Empleado $entity)
    {
        $form = $this->createForm(new EmpleadoType(), $entity, array(
            'action' => $this->generateUrl('admin_empleado_update', array('id' => $entity->getIdempleado())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Empleado entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:Empleado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Empleado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        
        $current_pass = $entity->getPassword();
        
        $editForm->handleRequest($request);
        
        if ($editForm->isValid()) {
            
            if ($current_pass != $entity->getPassword()) {
                $this->setSecurePassword($entity);
            }
            
            $em->flush();

            return $this->redirect($this->generateUrl('admin_empleado_edit', array('id' => $id)));
        }

        return $this->render('FisiSigriBundle:Crud\Empleado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Empleado entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FisiSigriBundle:Empleado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Empleado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_empleado'));
    }

    /**
     * Creates a form to delete a Empleado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_empleado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    private function setSecurePassword(&$entity) {
        $entity->setSalt(md5(time()));
        $encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }
}
