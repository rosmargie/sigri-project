<?php

namespace Fisi\SigriBundle\Controller\Crud;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fisi\SigriBundle\Entity\Rol;
use Fisi\SigriBundle\Form\RolType;

/**
 * Rol controller.
 *
 */
class RolController extends Controller
{

    /**
     * Lists all Rol entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FisiSigriBundle:Rol')->findAll();

        return $this->render('FisiSigriBundle:Crud\Rol:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Rol entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Rol();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_rol_show', array('id' => $entity->getId())));
        }

        return $this->render('FisiSigriBundle:Crud\Rol:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Rol entity.
     *
     * @param Rol $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rol $entity)
    {
        $form = $this->createForm(new RolType(), $entity, array(
            'action' => $this->generateUrl('admin_rol_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Rol entity.
     *
     */
    public function newAction()
    {
        $entity = new Rol();
        $form   = $this->createCreateForm($entity);

        return $this->render('FisiSigriBundle:Crud\Rol:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rol entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:Rol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FisiSigriBundle:Crud\Rol:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rol entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:Rol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rol entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FisiSigriBundle:Crud\Rol:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Rol entity.
    *
    * @param Rol $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Rol $entity)
    {
        $form = $this->createForm(new RolType(), $entity, array(
            'action' => $this->generateUrl('admin_rol_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Rol entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:Rol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_rol_edit', array('id' => $id)));
        }

        return $this->render('FisiSigriBundle:Crud\Rol:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Rol entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FisiSigriBundle:Rol')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rol entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_rol'));
    }

    /**
     * Creates a form to delete a Rol entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_rol_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
