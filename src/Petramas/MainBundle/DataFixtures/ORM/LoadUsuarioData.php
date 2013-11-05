<?php

namespace Petramas\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Petramas\MainBundle\DataFixtures\ORM\LoadPetramasData;
use Petramas\MainBundle\Entity\Usuario as Usuario;

class LoadUsuarioData extends LoadPetramasData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $usuarios = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($usuarios['Usuario'] as $reference => $columns)
        {
            $usuario = new Usuario();
            $usuario->setNombre($columns['nombre']);
            $usuario->setUsername($columns['username']);
            $usuario->setUsernameCanonical($columns['username_canonical']);
            $usuario->setEmail($columns['email']);
            $usuario->setEmailCanonical($columns['email_canonical']);
            $usuario->setEnabled($columns['enabled']);
            $usuario->setPlainPassword($columns['plain_password']);
            $usuario->setRoles($columns['roles']);
            $manager->persist($usuario);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Usuario_'. $reference, $usuario);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'usuarios';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 2;
    }
}