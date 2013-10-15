<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\RecepcionMaterial;
use Petramas\MainBundle\Form\RecepcionMaterialType;

/**
 * RecepcionMaterial controller.
 *
 * @Route("/recepcionmaterial")
 */
class RecepcionMaterialController extends Controller
{

    /**
     * Lists all RecepcionMaterial entities.
     *
     * @Route("/", name="recepcionmaterial")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:RecepcionMaterial')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new RecepcionMaterial entity.
     *
     * @Route("/", name="recepcionmaterial_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:RecepcionMaterial:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new RecepcionMaterial();
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
                    'message' => 'Recepción material creada con éxito.'
                )
            );

            return $this->redirect($this->generateUrl('recepcionmaterial_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a RecepcionMaterial entity.
    *
    * @param RecepcionMaterial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(RecepcionMaterial $entity)
    {
        $form = $this->createForm(new RecepcionMaterialType(), $entity, array(
            'action' => $this->generateUrl('recepcionmaterial_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new RecepcionMaterial entity.
     *
     * @Route("/new", name="recepcionmaterial_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new RecepcionMaterial();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a RecepcionMaterial entity.
     *
     * @Route("/{id}", name="recepcionmaterial_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:RecepcionMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecepcionMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing RecepcionMaterial entity.
     *
     * @Route("/{id}/edit", name="recepcionmaterial_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:RecepcionMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecepcionMaterial entity.');
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
    * Creates a form to edit a RecepcionMaterial entity.
    *
    * @param RecepcionMaterial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RecepcionMaterial $entity)
    {
        $form = $this->createForm(new RecepcionMaterialType(), $entity, array(
            'action' => $this->generateUrl('recepcionmaterial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing RecepcionMaterial entity.
     *
     * @Route("/{id}", name="recepcionmaterial_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:RecepcionMaterial:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:RecepcionMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecepcionMaterial entity.');
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
                    'message' => 'Recepción material actualizada satisfactoriamente.'
                )
            );

            return $this->redirect($this->generateUrl('recepcionmaterial', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a RecepcionMaterial entity.
     *
     * @Route("/{id}", name="recepcionmaterial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:RecepcionMaterial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RecepcionMaterial entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminada!',
                    'message' => 'Recepción material removida.'
                )
            );
        }

        return $this->redirect($this->generateUrl('recepcionmaterial'));
    }

    /**
     * Creates a form to delete a RecepcionMaterial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recepcionmaterial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
