<?php

namespace Petramas\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoletaRecepcionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaIngreso','datetime', array(
                'widget' => 'single_text',
                'date_format' => 'yyyy-MM-dd H:i:s')
            )
            ->add('fechaSalida','datetime', array(
                'widget' => 'single_text',
                'date_format' => 'yyyy-MM-dd H:i:s')
            )
            ->add('total')
            ->add('tara')
            ->add('neto')
            ->add('cliente')
            ->add('unidad')
            ->add('estado')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Petramas\MainBundle\Entity\BoletaRecepcion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'petramas_mainbundle_boletarecepcion';
    }
}
