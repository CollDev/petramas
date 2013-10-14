<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\LiquidacionMaterialDetalle;
use Petramas\MainBundle\Form\LiquidacionMaterialDetalleType;

/**
 * LiquidacionMaterialDetalle controller.
 *
 * @Route("/liquidacionmaterialdetalle")
 */
class LiquidacionMaterialDetalleController extends Controller
{

    /**
     * Lists all LiquidacionMaterialDetalle entities.
     *
     * @Route("/", name="liquidacionmaterialdetalle")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:LiquidacionMaterialDetalle')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new LiquidacionMaterialDetalle entity.
     *
     * @Route("/", name="liquidacionmaterialdetalle_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:LiquidacionMaterialDetalle:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new LiquidacionMaterialDetalle();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('liquidacionmaterialdetalle_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a LiquidacionMaterialDetalle entity.
    *
    * @param LiquidacionMaterialDetalle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(LiquidacionMaterialDetalle $entity)
    {
        $form = $this->createForm(new LiquidacionMaterialDetalleType(), $entity, array(
            'action' => $this->generateUrl('liquidacionmaterialdetalle_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LiquidacionMaterialDetalle entity.
     *
     * @Route("/new", name="liquidacionmaterialdetalle_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new LiquidacionMaterialDetalle();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a LiquidacionMaterialDetalle entity.
     *
     * @Route("/{id}", name="liquidacionmaterialdetalle_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionMaterialDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionMaterialDetalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing LiquidacionMaterialDetalle entity.
     *
     * @Route("/{id}/edit", name="liquidacionmaterialdetalle_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionMaterialDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionMaterialDetalle entity.');
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
    * Creates a form to edit a LiquidacionMaterialDetalle entity.
    *
    * @param LiquidacionMaterialDetalle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LiquidacionMaterialDetalle $entity)
    {
        $form = $this->createForm(new LiquidacionMaterialDetalleType(), $entity, array(
            'action' => $this->generateUrl('liquidacionmaterialdetalle_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LiquidacionMaterialDetalle entity.
     *
     * @Route("/{id}", name="liquidacionmaterialdetalle_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:LiquidacionMaterialDetalle:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionMaterialDetalle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionMaterialDetalle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('liquidacionmaterialdetalle', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a LiquidacionMaterialDetalle entity.
     *
     * @Route("/{id}", name="liquidacionmaterialdetalle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:LiquidacionMaterialDetalle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LiquidacionMaterialDetalle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('liquidacionmaterialdetalle'));
    }

    /**
     * Creates a form to delete a LiquidacionMaterialDetalle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('liquidacionmaterialdetalle_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
