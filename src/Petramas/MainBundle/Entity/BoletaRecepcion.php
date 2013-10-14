<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * BoletaRecepcion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\BoletaRecepcionRepository")
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
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="boleta_recepciones")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    protected $cliente;
    
    /**
     * @ORM\ManyToOne(targetEntity="Unidad", inversedBy="boleta_recepciones")
     * @ORM\JoinColumn(name="unidad_id", referencedColumnName="id")
     */
    protected $unidad;
    
    /**
     * @ORM\ManyToOne(targetEntity="Estado", inversedBy="boleta_recepciones")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     */
    protected $estado;
    
    /**
     * @ORM\OneToMany(targetEntity="BoletaMaterial", mappedBy="boleta_recepcion")
     */
    protected $boleta_materiales;
    
    /**
     * @ORM\OneToMany(targetEntity="RecepcionMaterial", mappedBy="boleta_recepcion")
     */
    protected $recepcion_materiales;
    
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
     * @ORM\Column(name="total", type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * @var float
     *
     * @ORM\Column(name="tara", type="decimal", precision=10, scale=2)
     */
    private $tara;

    /**
     * @var float
     *
     * @ORM\Column(name="neto", type="decimal", precision=10, scale=2)
     */
    private $neto;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->boleta_materiales = new ArrayCollection();
        $this->recepcion_materiales = new ArrayCollection();
    }

    /**
     * Magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getTotal();
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

    /**
     * Set cliente
     *
     * @param \Petramas\MainBundle\Entity\Cliente $cliente
     * @return BoletaRecepcion
     */
    public function setCliente(\Petramas\MainBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Petramas\MainBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set unidad
     *
     * @param \Petramas\MainBundle\Entity\Unidad $unidad
     * @return BoletaRecepcion
     */
    public function setUnidad(\Petramas\MainBundle\Entity\Unidad $unidad = null)
    {
        $this->unidad = $unidad;
    
        return $this;
    }

    /**
     * Get unidad
     *
     * @return \Petramas\MainBundle\Entity\Unidad 
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set estado
     *
     * @param \Petramas\MainBundle\Entity\Estado $estado
     * @return BoletaRecepcion
     */
    public function setEstado(\Petramas\MainBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \Petramas\MainBundle\Entity\Estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Add boleta_materiales
     *
     * @param \Petramas\MainBundle\Entity\BoletaMaterial $boletaMateriales
     * @return BoletaRecepcion
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
     * Add recepcion_materiales
     *
     * @param \Petramas\MainBundle\Entity\RecepcionMaterial $recepcionMateriales
     * @return BoletaRecepcion
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