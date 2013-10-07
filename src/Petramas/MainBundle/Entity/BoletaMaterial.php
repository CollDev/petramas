<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * BoletaMaterial
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\BoletaMaterialRepository")
 */
class BoletaMaterial
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
     * @var integer
     * 
     * @ORM\OneToMany(targetEntity="BoletaRecepcion", mappedBy="boleta_material")
     */
    protected $boleta_recepciones;
    
    /**
     * @var integer
     * 
     * @ORM\OneToMany(targetEntity="Tarifa", mappedBy="boleta_material")
     */
    protected $tarifas;
    
    /**
     * @var float
     *
     * @ORM\Column(name="neto", type="decimal")
     */
    private $neto;

    public function __construct()
    {
        $this->boleta_recepciones = new ArrayCollection();
        $this->tarifas = new ArrayCollection();
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
     * Set neto
     *
     * @param float $neto
     * @return BoletaMaterial
     */
    public function setNeto($neto)
    {
        $this->neto = $neto;
    
        return $this;
    }

    /**
     * Get neto
     *
     * @return float 
     */
    public function getNeto()
    {
        return $this->neto;
    }
}
