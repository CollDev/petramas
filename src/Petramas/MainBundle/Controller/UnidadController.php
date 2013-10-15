<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\Unidad;
use Petramas\MainBundle\Form\UnidadType;

/**
 * Unidad controller.
 *
 * @Route("/unidad")
 */
class UnidadController extends Controller
{

    /**
     * Lists all Unidad entities.
     *
     * @Route("/", name="unidad")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:Unidad')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Unidad entity.
     *
     * @Route("/", name="unidad_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:Unidad:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Unidad();
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
                    'message' => 'Unidad creada con éxito.'
                )
            );

            return $this->redirect($this->generateUrl('unidad_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Unidad entity.
    *
    * @param Unidad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Unidad $entity)
    {
        $form = $this->createForm(new UnidadType(), $entity, array(
            'action' => $this->generateUrl('unidad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new Unidad entity.
     *
     * @Route("/new", name="unidad_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Unidad();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Unidad entity.
     *
     * @Route("/{id}", name="unidad_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Unidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Unidad entity.
     *
     * @Route("/{id}/edit", name="unidad_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Unidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidad entity.');
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
    * Creates a form to edit a Unidad entity.
    *
    * @param Unidad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Unidad $entity)
    {
        $form = $this->createForm(new UnidadType(), $entity, array(
            'action' => $this->generateUrl('unidad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing Unidad entity.
     *
     * @Route("/{id}", name="unidad_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:Unidad:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Unidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidad entity.');
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
                    'message' => 'Unidad actualizada satisfactoriamente.'
                )
            );

            return $this->redirect($this->generateUrl('unidad', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Unidad entity.
     *
     * @Route("/{id}", name="unidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:Unidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Unidad entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminada!',
                    'message' => 'Unidad removida.'
                )
            );
        }

        return $this->redirect($this->generateUrl('unidad'));
    }

    /**
     * Creates a form to delete a Unidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('unidad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
