<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\UnidadMedida;
use Petramas\MainBundle\Form\UnidadMedidaType;

/**
 * UnidadMedida controller.
 *
 * @Route("/unidadmedida")
 */
class UnidadMedidaController extends Controller
{

    /**
     * Lists all UnidadMedida entities.
     *
     * @Route("/", name="unidadmedida")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:UnidadMedida')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new UnidadMedida entity.
     *
     * @Route("/", name="unidadmedida_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:UnidadMedida:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new UnidadMedida();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('unidadmedida_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a UnidadMedida entity.
    *
    * @param UnidadMedida $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(UnidadMedida $entity)
    {
        $form = $this->createForm(new UnidadMedidaType(), $entity, array(
            'action' => $this->generateUrl('unidadmedida_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new UnidadMedida entity.
     *
     * @Route("/new", name="unidadmedida_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new UnidadMedida();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a UnidadMedida entity.
     *
     * @Route("/{id}", name="unidadmedida_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:UnidadMedida')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UnidadMedida entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing UnidadMedida entity.
     *
     * @Route("/{id}/edit", name="unidadmedida_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:UnidadMedida')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UnidadMedida entity.');
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
    * Creates a form to edit a UnidadMedida entity.
    *
    * @param UnidadMedida $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UnidadMedida $entity)
    {
        $form = $this->createForm(new UnidadMedidaType(), $entity, array(
            'action' => $this->generateUrl('unidadmedida_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing UnidadMedida entity.
     *
     * @Route("/{id}", name="unidadmedida_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:UnidadMedida:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:UnidadMedida')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UnidadMedida entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('unidadmedida', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a UnidadMedida entity.
     *
     * @Route("/{id}", name="unidadmedida_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:UnidadMedida')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UnidadMedida entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('unidadmedida'));
    }

    /**
     * Creates a form to delete a UnidadMedida entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('unidadmedida_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
