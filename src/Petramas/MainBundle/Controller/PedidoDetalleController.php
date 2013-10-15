<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\PedidoDetalle;
use Petramas\MainBundle\Form\PedidoDetalleType;

/**
 * PedidoDetalle controller.
 *
 * @Route("/pedidodetalle")
 */
class PedidoDetalleController extends Controller
{

    /**
     * Lists all PedidoDetalle entities.
     *
     * @Route("/", name="pedidodetalle")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:PedidoDetalle')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PedidoDetalle entity.
     *
     * @Route("/", name="pedidodetalle_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:PedidoDetalle:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PedidoDetalle();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pedidodetalle_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a PedidoDetalle entity.
    *
    * @param PedidoDetalle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PedidoDetalle $entity)
    {
        $form = $this->createForm(new PedidoDetalleType(), $entity, array(
            'action' => $this->generateUrl('pedidodetalle_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new PedidoDetalle entity.
     *
     * @Route("/new", name="pedidodetalle_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PedidoDetalle();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PedidoDetalle entity.
     *
     * @Route("/{id}", name="pedidodetalle_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:PedidoDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PedidoDetalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PedidoDetalle entity.
     *
     * @Route("/{id}/edit", name="pedidodetalle_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:PedidoDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PedidoDetalle entity.');
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
    * Creates a form to edit a PedidoDetalle entity.
    *
    * @param PedidoDetalle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PedidoDetalle $entity)
    {
        $form = $this->createForm(new PedidoDetalleType(), $entity, array(
            'action' => $this->generateUrl('pedidodetalle_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing PedidoDetalle entity.
     *
     * @Route("/{id}", name="pedidodetalle_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:PedidoDetalle:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:PedidoDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PedidoDetalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pedidodetalle', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PedidoDetalle entity.
     *
     * @Route("/{id}", name="pedidodetalle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:PedidoDetalle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PedidoDetalle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pedidodetalle'));
    }

    /**
     * Creates a form to delete a PedidoDetalle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pedidodetalle_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
