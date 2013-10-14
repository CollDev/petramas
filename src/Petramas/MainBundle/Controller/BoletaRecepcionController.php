<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\BoletaRecepcion;
use Petramas\MainBundle\Form\BoletaRecepcionType;

/**
 * BoletaRecepcion controller.
 *
 * @Route("/boletarecepcion")
 */
class BoletaRecepcionController extends Controller
{

    /**
     * Lists all BoletaRecepcion entities.
     *
     * @Route("/", name="boletarecepcion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:BoletaRecepcion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BoletaRecepcion entity.
     *
     * @Route("/", name="boletarecepcion_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:BoletaRecepcion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BoletaRecepcion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('boletarecepcion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BoletaRecepcion entity.
    *
    * @param BoletaRecepcion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BoletaRecepcion $entity)
    {
        $form = $this->createForm(new BoletaRecepcionType(), $entity, array(
            'action' => $this->generateUrl('boletarecepcion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BoletaRecepcion entity.
     *
     * @Route("/new", name="boletarecepcion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BoletaRecepcion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BoletaRecepcion entity.
     *
     * @Route("/{id}", name="boletarecepcion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:BoletaRecepcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoletaRecepcion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BoletaRecepcion entity.
     *
     * @Route("/{id}/edit", name="boletarecepcion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:BoletaRecepcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoletaRecepcion entity.');
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
    * Creates a form to edit a BoletaRecepcion entity.
    *
    * @param BoletaRecepcion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BoletaRecepcion $entity)
    {
        $form = $this->createForm(new BoletaRecepcionType(), $entity, array(
            'action' => $this->generateUrl('boletarecepcion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BoletaRecepcion entity.
     *
     * @Route("/{id}", name="boletarecepcion_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:BoletaRecepcion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:BoletaRecepcion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoletaRecepcion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('boletarecepcion', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BoletaRecepcion entity.
     *
     * @Route("/{id}", name="boletarecepcion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:BoletaRecepcion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BoletaRecepcion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('boletarecepcion'));
    }

    /**
     * Creates a form to delete a BoletaRecepcion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boletarecepcion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
