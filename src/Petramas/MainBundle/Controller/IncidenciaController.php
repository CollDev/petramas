<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\Incidencia;
use Petramas\MainBundle\Form\IncidenciaType;

/**
 * Incidencia controller.
 *
 * @Route("/incidencia")
 */
class IncidenciaController extends Controller
{

    /**
     * Lists all Incidencia entities.
     *
     * @Route("/", name="incidencia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:Incidencia')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Incidencia entity.
     *
     * @Route("/", name="incidencia_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:Incidencia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Incidencia();
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
                    'message' => 'Incidencia creada con éxito.'
                )
            );
            
            return $this->redirect($this->generateUrl('incidencia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Incidencia entity.
    *
    * @param Incidencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Incidencia $entity)
    {
        $form = $this->createForm(new IncidenciaType(), $entity, array(
            'action' => $this->generateUrl('incidencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new Incidencia entity.
     *
     * @Route("/new", name="incidencia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Incidencia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Incidencia entity.
     *
     * @Route("/{id}/edit", name="incidencia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
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
    * Creates a form to edit a Incidencia entity.
    *
    * @param Incidencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Incidencia $entity)
    {
        $form = $this->createForm(new IncidenciaType(), $entity, array(
            'action' => $this->generateUrl('incidencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:Incidencia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
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
                    'message' => 'Incidencia actualizada satisfactoriamente.'
                )
            );
            
            return $this->redirect($this->generateUrl('incidencia', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:Incidencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Incidencia entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminada!',
                    'message' => 'Incidencia removida.'
                )
            );
        }

        return $this->redirect($this->generateUrl('incidencia'));
    }

    /**
     * Creates a form to delete a Incidencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('incidencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
