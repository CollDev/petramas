<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\IncidenciaResolucion;
use Petramas\MainBundle\Form\IncidenciaResolucionType;

/**
 * IncidenciaResolucion controller.
 *
 * @Route("/incidenciaresolucion")
 */
class IncidenciaResolucionController extends Controller
{

    /**
     * Lists all IncidenciaResolucion entities.
     *
     * @Route("/", name="incidenciaresolucion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:IncidenciaResolucion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new IncidenciaResolucion entity.
     *
     * @Route("/", name="incidenciaresolucion_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:IncidenciaResolucion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new IncidenciaResolucion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('incidenciaresolucion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a IncidenciaResolucion entity.
    *
    * @param IncidenciaResolucion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(IncidenciaResolucion $entity)
    {
        $form = $this->createForm(new IncidenciaResolucionType(), $entity, array(
            'action' => $this->generateUrl('incidenciaresolucion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new IncidenciaResolucion entity.
     *
     * @Route("/new", name="incidenciaresolucion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new IncidenciaResolucion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a IncidenciaResolucion entity.
     *
     * @Route("/{id}", name="incidenciaresolucion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:IncidenciaResolucion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IncidenciaResolucion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing IncidenciaResolucion entity.
     *
     * @Route("/{id}/edit", name="incidenciaresolucion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:IncidenciaResolucion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IncidenciaResolucion entity.');
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
    * Creates a form to edit a IncidenciaResolucion entity.
    *
    * @param IncidenciaResolucion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(IncidenciaResolucion $entity)
    {
        $form = $this->createForm(new IncidenciaResolucionType(), $entity, array(
            'action' => $this->generateUrl('incidenciaresolucion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing IncidenciaResolucion entity.
     *
     * @Route("/{id}", name="incidenciaresolucion_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:IncidenciaResolucion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:IncidenciaResolucion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IncidenciaResolucion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('incidenciaresolucion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a IncidenciaResolucion entity.
     *
     * @Route("/{id}", name="incidenciaresolucion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:IncidenciaResolucion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find IncidenciaResolucion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('incidenciaresolucion'));
    }

    /**
     * Creates a form to delete a IncidenciaResolucion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('incidenciaresolucion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
