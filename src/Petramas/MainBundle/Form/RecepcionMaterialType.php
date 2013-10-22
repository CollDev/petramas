<?php

namespace Petramas\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecepcionMaterialType extends AbstractType
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
            ->add('cantidad')
            ->add('boleta_recepcion')
            ->add('material')
            ->add('unidad_medida')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Petramas\MainBundle\Entity\RecepcionMaterial'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'petramas_mainbundle_recepcionmaterial';
    }
}
