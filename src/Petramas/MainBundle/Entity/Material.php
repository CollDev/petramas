<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\MaterialRepository")
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


    public function __construct()
    {
        $this->pedido_detalles = new ArrayCollection();
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
}
