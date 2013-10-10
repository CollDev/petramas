<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * UnidadMedida
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\UnidadMedidaRepository")
 */
class UnidadMedida
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
     * @ORM\OneToMany(targetEntity="RecepcionMaterial", mappedBy="unidad_medida")
     */
    protected $recepcion_materiales;
    
    /**
     * @ORM\OneToMany(targetEntity="Tope", mappedBy="unidad_medida")
     */
    protected $topes;
    
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
        $this->recepcion_materiales = new ArrayCollection();
        $this->topes = new ArrayCollection();
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
     * @return UnidadMedida
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
     * @return UnidadMedida
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
     * Add recepcion_materiales
     *
     * @param \Petramas\MainBundle\Entity\RecepcionMaterial $recepcionMateriales
     * @return UnidadMedida
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

    /**
     * Add topes
     *
     * @param \Petramas\MainBundle\Entity\Tope $topes
     * @return UnidadMedida
     */
    public function addTopes(\Petramas\MainBundle\Entity\Tope $topes)
    {
        $this->topes[] = $topes;
    
        return $this;
    }

    /**
     * Remove topes
     *
     * @param \Petramas\MainBundle\Entity\Tope $topes
     */
    public function removeTopes(\Petramas\MainBundle\Entity\Tope $topes)
    {
        $this->topes->removeElement($topes);
    }

    /**
     * Get topes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopes()
    {
        return $this->topes;
    }
}