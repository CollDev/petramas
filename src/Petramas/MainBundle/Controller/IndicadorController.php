<?php

namespace Petramas\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Petramas\MainBundle\Entity\Indicador;
use Petramas\MainBundle\Form\IndicadorType;

/**
 * Indicador controller.
 *
 * @Route("/indicador")
 */
class IndicadorController extends Controller
{

    /**
     * Lists all Indicador entities.
     *
     * @Route("/", name="indicador")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PetramasMainBundle:Indicador')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Indicador entity.
     *
     * @Route("/", name="indicador_create")
     * @Method("POST")
     * @Template("PetramasMainBundle:Indicador:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Indicador();
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
                    'message' => 'Indicador creado con éxito.'
                )
            );
            
            return $this->redirect($this->generateUrl('indicador_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Indicador entity.
    *
    * @param Indicador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Indicador $entity)
    {
        $form = $this->createForm(new IndicadorType(), $entity, array(
            'action' => $this->generateUrl('indicador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary entity-submit pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new Indicador entity.
     *
     * @Route("/new", name="indicador_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Indicador();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Indicador entity.
     *
     * @Route("/{id}", name="indicador_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Indicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indicador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Indicador entity.
     *
     * @Route("/{id}/edit", name="indicador_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Indicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indicador entity.');
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
    * Creates a form to edit a Indicador entity.
    *
    * @param Indicador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Indicador $entity)
    {
        $form = $this->createForm(new IndicadorType(), $entity, array(
            'action' => $this->generateUrl('indicador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-warning entity-submit pull-right')));

        return $form;
    }
    /**
     * Edits an existing Indicador entity.
     *
     * @Route("/{id}", name="indicador_update")
     * @Method("PUT")
     * @Template("PetramasMainBundle:Indicador:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PetramasMainBundle:Indicador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indicador entity.');
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
                    'message' => 'Indicador actualizado satisfactoriamente.'
                )
            );

            return $this->redirect($this->generateUrl('indicador', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Indicador entity.
     *
     * @Route("/{id}", name="indicador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PetramasMainBundle:Indicador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Indicador entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->set(
                'success',
                array(
                    'title' => 'Eliminado!',
                    'message' => 'Indicador removido.'
                )
            );
        }

        return $this->redirect($this->generateUrl('indicador'));
    }

    /**
     * Creates a form to delete a Indicador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('indicador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-danger entity-submit-delete pull-right')))
            ->getForm()
        ;
    }
}
