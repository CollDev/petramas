<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BoletaRecepcion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\BoletaRecepcionRepository")
 */
class BoletaRecepcion
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime")
     */
    private $fechaIngreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_salida", type="datetime")
     */
    private $fechaSalida;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="decimal")
     */
    private $total;

    /**
     * @var float
     *
     * @ORM\Column(name="tara", type="decimal")
     */
    private $tara;

    /**
     * @var float
     *
     * @ORM\Column(name="neto", type="decimal")
     */
    private $neto;


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
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return BoletaRecepcion
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;
    
        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set fechaSalida
     *
     * @param \DateTime $fechaSalida
     * @return BoletaRecepcion
     */
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;
    
        return $this;
    }

    /**
     * Get fechaSalida
     *
     * @return \DateTime 
     */
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return BoletaRecepcion
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set tara
     *
     * @param float $tara
     * @return BoletaRecepcion
     */
    public function setTara($tara)
    {
        $this->tara = $tara;
    
        return $this;
    }

    /**
     * Get tara
     *
     * @return float 
     */
    public function getTara()
    {
        return $this->tara;
    }

    /**
     * Set neto
     *
     * @param float $neto
     * @return BoletaRecepcion
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
