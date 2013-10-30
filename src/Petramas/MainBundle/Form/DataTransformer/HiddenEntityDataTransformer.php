<?php

namespace Petramas\MainBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Supports hidden entity
 *
 * @author Joe Robles <joe.robles.pdj@gmail.com>
 */
class HiddenEntityDataTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;
    private $entity;
 
    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om, $entity)
    {
        $this->om = $om;
        $this->entity = $entity;
    }
 
    /**
     * Transforms an object to a hidden id.
     *
     * @param  Object|null $object
     * @return id
     */
    public function transform($object)
    {
        if (null === $object) {
            return "";
        }
 
        return $object->getId();
    }
 
    /**
     * Transforms an id to an object.
     *
     * @param  string $number
     * @return Object|null
     * @throws TransformationFailedException if object (entity) is not found.
     *
     */
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }
 
        $object = $this->om
            ->getRepository($this->entity)
            ->find($id)
        ;
 
        if (null === $object) {
            throw new TransformationFailedException(sprintf(
                'An issue with entity "%s" does not exist!',
                $id
            ));
        }
 
        return $object;
    }
}
