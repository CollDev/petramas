<?php

namespace Petramas\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Petramas\MainBundle\Form\DataTransformer\HiddenEntityDataTransformer;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of HiddenEntityType
 *
 * @author Joe Robles <joe.robles.pdj@gmail.com>
 */
class HiddenEntityType extends AbstractType
{
    /**
     * @var ObjectManager
     */
    private $om;
 
    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }
 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new HiddenEntityDataTransformer($this->om, $options['entity']);
        $builder->addModelTransformer($transformer);
    }
 
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'invalid_message' => 'Invalid object',
            'entity' => null
        ));
    }
 
    public function getParent()
    {
        return 'hidden';
    }
 
    public function getName()
    {
        return 'hidden_entity';
    }
}
