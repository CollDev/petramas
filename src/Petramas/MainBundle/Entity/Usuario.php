<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="RecepcionMaterial", mappedBy="usuario")
     */
    protected $recepcion_materiales;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recepcion_materiales = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add recepcion_materiales
     *
     * @param \Petramas\MainBundle\Entity\RecepcionMaterial $recepcionMateriales
     * @return Usuario
     */
    public function addRecepcionMateriales(\Petramas\MainBundle\Entity\RecepcionMaterial $recepcionMateriales)
    {
        $this->recepcion_materiales[] = $recepcionMateriales;
    
        return $this;
    }

    /**
     * Remove recepcion_materiales
     *
     * @param \Petramas\MainBundle\Entity\RecepcionMaterial $recepcionMateriales
     */
    public function removeRecepcionMateriales(\Petramas\MainBundle\Entity\RecepcionMaterial $recepcionMateriales)
    {
        $this->recepcion_materiales->removeElement($recepcionMateriales);
    }

    /**
     * Get recepcion_materiales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecepcionMateriales()
    {
        return $this->recepcion_materiales;
    }
}