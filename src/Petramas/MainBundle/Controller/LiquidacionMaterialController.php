<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\LiquidacionMaterial;
use Petramas\MainBundle\Form\LiquidacionMaterialType;

/**
 * LiquidacionMaterial controller.
 *
 * @Route("/liquidacionmaterial")
 */
class LiquidacionMaterialController extends Controller
{

    /**
     * Lists all LiquidacionMaterial entities.
     *
     * @Route("/", name="liquidacionmaterial")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:LiquidacionMaterial')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new LiquidacionMaterial entity.
     *
     * @Route("/", name="liquidacionmaterial_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:LiquidacionMaterial:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new LiquidacionMaterial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('liquidacionmaterial_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a LiquidacionMaterial entity.
    *
    * @param LiquidacionMaterial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(LiquidacionMaterial $entity)
    {
        $form = $this->createForm(new LiquidacionMaterialType(), $entity, array(
            'action' => $this->generateUrl('liquidacionmaterial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new LiquidacionMaterial entity.
     *
     * @Route("/new", name="liquidacionmaterial_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new LiquidacionMaterial();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a LiquidacionMaterial entity.
     *
     * @Route("/{id}", name="liquidacionmaterial_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing LiquidacionMaterial entity.
     *
     * @Route("/{id}/edit", name="liquidacionmaterial_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionMaterial entity.');
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
    * Creates a form to edit a LiquidacionMaterial entity.
    *
    * @param LiquidacionMaterial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LiquidacionMaterial $entity)
    {
        $form = $this->createForm(new LiquidacionMaterialType(), $entity, array(
            'action' => $this->generateUrl('liquidacionmaterial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing LiquidacionMaterial entity.
     *
     * @Route("/{id}", name="liquidacionmaterial_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:LiquidacionMaterial:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:LiquidacionMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LiquidacionMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('liquidacionmaterial', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a LiquidacionMaterial entity.
     *
     * @Route("/{id}", name="liquidacionmaterial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:LiquidacionMaterial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LiquidacionMaterial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('liquidacionmaterial'));
    }

    /**
     * Creates a form to delete a LiquidacionMaterial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('liquidacionmaterial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
