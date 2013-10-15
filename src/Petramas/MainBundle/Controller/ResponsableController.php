<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\Responsable;
use Petramas\MainBundle\Form\ResponsableType;

/**
 * Responsable controller.
 *
 * @Route("/responsable")
 */
class ResponsableController extends Controller
{

    /**
     * Lists all Responsable entities.
     *
     * @Route("/", name="responsable")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:Responsable')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Responsable entity.
     *
     * @Route("/", name="responsable_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:Responsable:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Responsable();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Nuevo!',
                    'message' => 'Recepción creado con éxito.'
                )
            );

            return $this->redirect($this->generateUrl('responsable_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Responsable entity.
    *
    * @param Responsable $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Responsable $entity)
    {
        $form = $this->createForm(new ResponsableType(), $entity, array(
            'action' => $this->generateUrl('responsable_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new Responsable entity.
     *
     * @Route("/new", name="responsable_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Responsable();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Responsable entity.
     *
     * @Route("/{id}", name="responsable_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Responsable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Responsable entity.
     *
     * @Route("/{id}/edit", name="responsable_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Responsable entity.');
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
    * Creates a form to edit a Responsable entity.
    *
    * @param Responsable $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Responsable $entity)
    {
        $form = $this->createForm(new ResponsableType(), $entity, array(
            'action' => $this->generateUrl('responsable_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing Responsable entity.
     *
     * @Route("/{id}", name="responsable_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:Responsable:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Responsable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Editado!',
                    'message' => 'Responsable actualizado satisfactoriamente.'
                )
            );

            return $this->redirect($this->generateUrl('responsable', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Responsable entity.
     *
     * @Route("/{id}", name="responsable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:Responsable')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Responsable entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminado!',
                    'message' => 'Responsable removido.'
                )
            );
        }

        return $this->redirect($this->generateUrl('responsable'));
    }

    /**
     * Creates a form to delete a Responsable entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('responsable_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
