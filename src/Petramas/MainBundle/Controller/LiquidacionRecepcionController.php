<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\LiquidacionRecepcion;
use Petramas\MainBundle\Form\LiquidacionRecepcionType;

/**
 * LiquidacionRecepcion controller.
 *
 * @Route("/liquidacionrecepcion")
 */
class LiquidacionRecepcionController extends Controller
{

    /**
     * Lists all LiquidacionRecepcion entities.
     *
     * @Route("/", name="liquidacionrecepcion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:LiquidacionRecepcion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new LiquidacionRecepcion entity.
     *
     * @Route("/", name="liquidacionrecepcion_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:LiquidacionRecepcion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new LiquidacionRecepcion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Nueva!',
                    'message' => 'Liquidación recepción creada con éxito.'
                )
            );
            
            return $this->redirect($this->generateUrl('liquidacionrecepcion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a LiquidacionRecepcion entity.
    *
    * @param LiquidacionRecepcion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(LiquidacionRecepcion $entity)
    {
        $form = $this->createForm(new LiquidacionRecepcionType(), $entity, array(
            'action' => $this->generateUrl('liquidacionrecepcion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new LiquidacionRecepcion entity.
     *
     * @Route("/new", name="liquidacionrecepcion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new LiquidacionRecepcion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a LiquidacionRecepcion entity.
     *
     * @Route("/{id}", name="liquidacionrecepcion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionRecepcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionRecepcion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing LiquidacionRecepcion entity.
     *
     * @Route("/{id}/edit", name="liquidacionrecepcion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionRecepcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionRecepcion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a LiquidacionRecepcion entity.
    *
    * @param LiquidacionRecepcion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LiquidacionRecepcion $entity)
    {
        $form = $this->createForm(new LiquidacionRecepcionType(), $entity, array(
            'action' => $this->generateUrl('liquidacionrecepcion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing LiquidacionRecepcion entity.
     *
     * @Route("/{id}", name="liquidacionrecepcion_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:LiquidacionRecepcion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionRecepcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionRecepcion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Editada!',
                    'message' => 'Liquidación recepción actualizada satisfactoriamente.'
                )
            );

            return $this->redirect($this->generateUrl('liquidacionrecepcion', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a LiquidacionRecepcion entity.
     *
     * @Route("/{id}", name="liquidacionrecepcion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:LiquidacionRecepcion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LiquidacionRecepcion entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminada!',
                    'message' => 'Liquidación recepción removida.'
                )
            );
        }

        return $this->redirect($this->generateUrl('liquidacionrecepcion'));
    }

    /**
     * Creates a form to delete a LiquidacionRecepcion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('liquidacionrecepcion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
