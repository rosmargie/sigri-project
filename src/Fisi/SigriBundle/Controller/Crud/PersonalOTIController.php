<?php

namespace Fisi\SigriBundle\Controller\Crud;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fisi\SigriBundle\Entity\PersonalOTI;
use Fisi\SigriBundle\Form\PersonalOTIType;

/**
 * PersonalOTI controller.
 *
 */
class PersonalOTIController extends Controller
{

    /**
     * Lists all PersonalOTI entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FisiSigriBundle:PersonalOTI')->findAll();

        return $this->render('FisiSigriBundle:Crud\PersonalOTI:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PersonalOTI entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PersonalOTI();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_personaloti_show', array('id' => $entity->getId())));
        }

        return $this->render('FisiSigriBundle:Crud\PersonalOTI:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PersonalOTI entity.
     *
     * @param PersonalOTI $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PersonalOTI $entity)
    {
        $form = $this->createForm(new PersonalOTIType(), $entity, array(
            'action' => $this->generateUrl('admin_personaloti_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PersonalOTI entity.
     *
     */
    public function newAction()
    {
        $entity = new PersonalOTI();
        $form   = $this->createCreateForm($entity);

        return $this->render('FisiSigriBundle:Crud\PersonalOTI:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PersonalOTI entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:PersonalOTI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonalOTI entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FisiSigriBundle:Crud\PersonalOTI:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PersonalOTI entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:PersonalOTI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonalOTI entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FisiSigriBundle:Crud\PersonalOTI:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PersonalOTI entity.
    *
    * @param PersonalOTI $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PersonalOTI $entity)
    {
        $form = $this->createForm(new PersonalOTIType(), $entity, array(
            'action' => $this->generateUrl('admin_personaloti_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PersonalOTI entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FisiSigriBundle:PersonalOTI')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonalOTI entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_personaloti_edit', array('id' => $id)));
        }

        return $this->render('FisiSigriBundle:Crud\PersonalOTI:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PersonalOTI entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FisiSigriBundle:PersonalOTI')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PersonalOTI entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_personaloti'));
    }

    /**
     * Creates a form to delete a PersonalOTI entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_personaloti_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
