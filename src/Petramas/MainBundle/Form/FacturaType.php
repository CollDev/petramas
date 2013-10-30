<?php

namespace Petramas\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacturaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('total')
            ->add('fecha','datetime', array(
                'widget' => 'single_text',
                'date_format' => 'yyyy-MM-dd H:i:s')
            )
            ->add('cliente')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Petramas\MainBundle\Entity\Factura'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'petramas_mainbundle_factura';
    }
}
