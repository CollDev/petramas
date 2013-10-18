<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TipoIndicador
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\TipoIndicadorRepository")
 */
class TipoIndicador
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
     * @ORM\OneToMany(targetEntity="Indicador", mappedBy="tipo_indicador")
     */
    protected $indicadores;
    
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
        $this->indicadores = new ArrayCollection();
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
     * @return TipoIndicador
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
     * Add indicadores
     *
     * @param \Petramas\MainBundle\Entity\Indicador $indicadores
     * @return TipoIndicador
     */
    public function addIndicadores(\Petramas\MainBundle\Entity\Indicador $indicadores)
    {
        $this->indicadores[] = $indicadores;
    
        return $this;
    }

    /**
     * Remove indicadores
     *
     * @param \Petramas\MainBundle\Entity\Indicador $indicadores
     */
    public function removeIndicadores(\Petramas\MainBundle\Entity\Indicador $indicadores)
    {
        $this->indicadores->removeElement($indicadores);
    }

    /**
     * Get indicadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIndicadores()
    {
        return $this->indicadores;
    }
}