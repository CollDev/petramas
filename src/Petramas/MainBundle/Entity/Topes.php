<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\TopesRepository")
 */
class Topes
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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="acumulado", type="decimal")
     */
    private $acumulado;

    /**
     * @var float
     *
     * @ORM\Column(name="previo", type="decimal")
     */
    private $previo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime")
     */
    private $fechaRegistro;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Topes
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set acumulado
     *
     * @param float $acumulado
     * @return Topes
     */
    public function setAcumulado($acumulado)
    {
        $this->acumulado = $acumulado;
    
        return $this;
    }

    /**
     * Get acumulado
     *
     * @return float 
     */
    public function getAcumulado()
    {
        return $this->acumulado;
    }

    /**
     * Set previo
     *
     * @param float $previo
     * @return Topes
     */
    public function setPrevio($previo)
    {
        $this->previo = $previo;
    
        return $this;
    }

    /**
     * Get previo
     *
     * @return float 
     */
    public function getPrevio()
    {
        return $this->previo;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Topes
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    
        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }
}
