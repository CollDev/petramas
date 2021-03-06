<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\Tope;
use Petramas\MainBundle\Form\TopeType;

/**
 * Tope controller.
 *
 * @Route("/tope")
 */
class TopeController extends Controller
{

    /**
     * Lists all Tope entities.
     *
     * @Route("/", name="tope")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:Tope')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tope entity.
     *
     * @Route("/", name="tope_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:Tope:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tope();
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
                    'message' => 'Tope creado con éxito.'
                )
            );

            return $this->redirect($this->generateUrl('tope_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Tope entity.
    *
    * @param Tope $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tope $entity)
    {
        $form = $this->createForm(new TopeType(), $entity, array(
            'action' => $this->generateUrl('tope_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new Tope entity.
     *
     * @Route("/new", name="tope_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tope();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tope entity.
     *
     * @Route("/{id}", name="tope_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Tope')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tope entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tope entity.
     *
     * @Route("/{id}/edit", name="tope_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Tope')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tope entity.');
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
    * Creates a form to edit a Tope entity.
    *
    * @param Tope $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tope $entity)
    {
        $form = $this->createForm(new TopeType(), $entity, array(
            'action' => $this->generateUrl('tope_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing Tope entity.
     *
     * @Route("/{id}", name="tope_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:Tope:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Tope')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tope entity.');
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
                    'message' => 'Tope actualizado satisfactoriamente.'
                )
            );

            return $this->redirect($this->generateUrl('tope', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tope entity.
     *
     * @Route("/{id}", name="tope_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:Tope')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tope entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminado!',
                    'message' => 'Tope removido.'
                )
            );
        }

        return $this->redirect($this->generateUrl('tope'));
    }

    /**
     * Creates a form to delete a Tope entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tope_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
