<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tarifa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\TarifaRepository")
 */
class Tarifa
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
     * @ORM\OneToMany(targetEntity="BoletaMaterial", mappedBy="tarifa")
     */
    protected $boleta_materiales;
    
    /**
     * @ORM\OneToMany(targetEntity="Material", mappedBy="tarifa")
     */
    protected $materiales;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2)
     */
    private $valor;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->boleta_materiales = new ArrayCollection();
        $this->materiales = new ArrayCollection();
    }

    /**
     * Magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getNombre();
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
     * @return Tarifa
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
     * Set valor
     *
     * @param float $valor
     * @return Tarifa
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Add boleta_materiales
     *
     * @param \Petramas\MainBundle\Entity\BoletaMaterial $boletaMateriales
     * @return Tarifa
     */
    public function addBoletaMateriales(\Petramas\MainBundle\Entity\BoletaMaterial $boletaMateriales)
    {
        $this->boleta_materiales[] = $boletaMateriales;
    
        return $this;
    }

    /**
     * Remove boleta_materiales
     *
     * @param \Petramas\MainBundle\Entity\BoletaMaterial $boletaMateriales
     */
    public function removeBoletaMateriales(\Petramas\MainBundle\Entity\BoletaMaterial $boletaMateriales)
    {
        $this->boleta_materiales->removeElement($boletaMateriales);
    }

    /**
     * Get boleta_materiales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBoletaMateriales()
    {
        return $this->boleta_materiales;
    }

    /**
     * Add materiales
     *
     * @param \Petramas\MainBundle\Entity\Material $materiales
     * @return Tarifa
     */
    public function addMateriales(\Petramas\MainBundle\Entity\Material $materiales)
    {
        $this->materiales[] = $materiales;
    
        return $this;
    }

    /**
     * Remove materiales
     *
     * @param \Petramas\MainBundle\Entity\Material $materiales
     */
    public function removeMateriales(\Petramas\MainBundle\Entity\Material $materiales)
    {
        $this->materiales->removeElement($materiales);
    }

    /**
     * Get materiales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMateriales()
    {
        return $this->materiales;
    }
}