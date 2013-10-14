<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Material
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\MaterialRepository")
 */
class Material
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
     * @ORM\OneToMany(targetEntity="PedidoDetalle", mappedBy="material")
     */
    protected $pedido_detalles;
    
    /**
     * @ORM\OneToMany(targetEntity="RecepcionMaterial", mappedBy="material")
     */
    protected $recepcion_materiales;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="stock", type="decimal", precision=10, scale=2)
     */
    private $stock;

    /**
     * @var float
     *
     * @ORM\Column(name="tarifa", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $tarifa;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pedido_detalles = new ArrayCollection();
        $this->recepcion_materiales = new ArrayCollection();
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
     * @return Material
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
     * Set stock
     *
     * @param float $stock
     * @return Material
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    
        return $this;
    }

    /**
     * Get stock
     *
     * @return float 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set tarifa
     *
     * @param float $tarifa
     * @return Material
     */
    public function setTarifa($tarifa)
    {
        $this->tarifa = $tarifa;
    
        return $this;
    }

    /**
     * Get tarifa
     *
     * @return float 
     */
    public function getTarifa()
    {
        return $this->tarifa;
    }

    /**
     * Add pedido_detalles
     *
     * @param \Petramas\MainBundle\Entity\PedidoDetalle $pedidoDetalles
     * @return Material
     */
    public function addPedidoDetalles(\Petramas\MainBundle\Entity\PedidoDetalle $pedidoDetalles)
    {
        $this->pedido_detalles[] = $pedidoDetalles;
    
        return $this;
    }

    /**
     * Remove pedido_detalles
     *
     * @param \Petramas\MainBundle\Entity\PedidoDetalle $pedidoDetalles
     */
    public function removePedidoDetalles(\Petramas\MainBundle\Entity\PedidoDetalle $pedidoDetalles)
    {
        $this->pedido_detalles->removeElement($pedidoDetalles);
    }

    /**
     * Get pedido_detalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPedidoDetalles()
    {
        return $this->pedido_detalles;
    }

    /**
     * Add recepcion_materiales
     *
     * @param \Petramas\MainBundle\Entity\RecepcionMaterial $recepcionMateriales
     * @return Material
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