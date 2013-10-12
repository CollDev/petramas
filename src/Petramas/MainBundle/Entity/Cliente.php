<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cliente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\ClienteRepository")
 */
class Cliente
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
     * @ORM\ManyToOne(targetEntity="Estado", inversedBy="clientes")
     * @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     */
    protected $estado;
    
    /**
     * @ORM\OneToMany(targetEntity="BoletaRecepcion", mappedBy="cliente")
     */
    protected $boleta_recepciones;
    
    /**
     * @ORM\OneToMany(targetEntity="Factura", mappedBy="cliente")
     */
    protected $facturas;
    
    /**
     * @ORM\OneToMany(targetEntity="LiquidacionMaterial", mappedBy="cliente")
     */
    protected $liquidacion_materiales;
    
    /**
     * @ORM\OneToMany(targetEntity="LiquidacionRecepcion", mappedBy="cliente")
     */
    protected $liquidacion_recepciones;
    
    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="cliente")
     */
    protected $pedidos;
    
    /**
     * @var string
     *
     * @ORM\Column(name="razon_social", type="string", length=255)
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="ruc", type="string", length=9)
     */
    private $ruc;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->boleta_recepciones = new ArrayCollection();
        $this->facturas = new ArrayCollection();
        $this->liquidacion_materiales = new ArrayCollection();
        $this->liquidacion_recepciones = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
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
     * Set razonSocial
     *
     * @param string $razonSocial
     * @return Cliente
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    
        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set ruc
     *
     * @param string $ruc
     * @return Cliente
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    
        return $this;
    }

    /**
     * Get ruc
     *
     * @return string 
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Cliente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set estado
     *
     * @param \Petramas\MainBundle\Entity\Estado $estado
     * @return Cliente
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
     * Add boleta_recepciones
     *
     * @param \Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones
     * @return Cliente
     */
    public function addBoletaRecepciones(\Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones)
    {
        $this->boleta_recepciones[] = $boletaRecepciones;
    
        return $this;
    }

    /**
     * Remove boleta_recepciones
     *
     * @param \Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones
     */
    public function removeBoletaRecepciones(\Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepciones)
    {
        $this->boleta_recepciones->removeElement($boletaRecepciones);
    }

    /**
     * Get boleta_recepciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBoletaRecepciones()
    {
        return $this->boleta_recepciones;
    }

    /**
     * Add facturas
     *
     * @param \Petramas\MainBundle\Entity\Factura $facturas
     * @return Cliente
     */
    public function addFacturas(\Petramas\MainBundle\Entity\Factura $facturas)
    {
        $this->facturas[] = $facturas;
    
        return $this;
    }

    /**
     * Remove facturas
     *
     * @param \Petramas\MainBundle\Entity\Factura $facturas
     */
    public function removeFacturas(\Petramas\MainBundle\Entity\Factura $facturas)
    {
        $this->facturas->removeElement($facturas);
    }

    /**
     * Get facturas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFacturas()
    {
        return $this->facturas;
    }

    /**
     * Add liquidacion_materiales
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionMaterial $liquidacionMateriales
     * @return Cliente
     */
    public function addLiquidacionMateriales(\Petramas\MainBundle\Entity\LiquidacionMaterial $liquidacionMateriales)
    {
        $this->liquidacion_materiales[] = $liquidacionMateriales;
    
        return $this;
    }

    /**
     * Remove liquidacion_materiales
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionMaterial $liquidacionMateriales
     */
    public function removeLiquidacionMateriales(\Petramas\MainBundle\Entity\LiquidacionMaterial $liquidacionMateriales)
    {
        $this->liquidacion_materiales->removeElement($liquidacionMateriales);
    }

    /**
     * Get liquidacion_materiales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionMateriales()
    {
        return $this->liquidacion_materiales;
    }

    /**
     * Add liquidacion_recepciones
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionRecepcion $liquidacionRecepciones
     * @return Cliente
     */
    public function addLiquidacionRecepciones(\Petramas\MainBundle\Entity\LiquidacionRecepcion $liquidacionRecepciones)
    {
        $this->liquidacion_recepciones[] = $liquidacionRecepciones;
    
        return $this;
    }

    /**
     * Remove liquidacion_recepciones
     *
     * @param \Petramas\MainBundle\Entity\LiquidacionRecepcion $liquidacionRecepciones
     */
    public function removeLiquidacionRecepciones(\Petramas\MainBundle\Entity\LiquidacionRecepcion $liquidacionRecepciones)
    {
        $this->liquidacion_recepciones->removeElement($liquidacionRecepciones);
    }

    /**
     * Get liquidacion_recepciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiquidacionRecepciones()
    {
        return $this->liquidacion_recepciones;
    }

    /**
     * Add pedidos
     *
     * @param \Petramas\MainBundle\Entity\Pedido $pedidos
     * @return Cliente
     */
    public function addPedidos(\Petramas\MainBundle\Entity\Pedido $pedidos)
    {
        $this->pedidos[] = $pedidos;
    
        return $this;
    }

    /**
     * Remove pedidos
     *
     * @param \Petramas\MainBundle\Entity\Pedido $pedidos
     */
    public function removePedidos(\Petramas\MainBundle\Entity\Pedido $pedidos)
    {
        $this->pedidos->removeElement($pedidos);
    }

    /**
     * Get pedidos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }
}