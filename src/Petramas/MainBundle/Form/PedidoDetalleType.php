<?php

namespace Petramas\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PedidoDetalleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('pedido', 'hidden_entity', array(
                'entity' => 'PetramasMainBundle:Pedido'
            ))
            ->add('material', 'extended_entity',array(
                'class' => 'PetramasMainBundle:Material',
                // 'option_attributes' injects $incident->getSlug() into each option tag e.g. <option data-slug="foo"...> 
                'option_attributes' => array('data-tarifa' => 'tarifa'), 
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Petramas\MainBundle\Entity\PedidoDetalle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'petramas_mainbundle_pedidodetalle';
    }
}
