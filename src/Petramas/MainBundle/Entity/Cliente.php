<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Entity\ClienteRepository")
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
     * @ORM\OneToMany(targetEntity="Estado", mappedBy="Cliente")
     */
    protected $estados;
    
    /**
     * @ORM\ManyToOne(targetEntity="BoletaRecepcion", inversedBy="clientes")
     * @ORM\JoinColumn(name="boleta_recepcion_id", referencedColumnName="id")
     */
    protected $boleta_recepcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Factura", inversedBy="clientes")
     * @ORM\JoinColumn(name="factura_id", referencedColumnName="id")
     */
    protected $factura;
    
    /**
     * @ORM\ManyToOne(targetEntity="LiquidacionMaterial", inversedBy="clientes")
     * @ORM\JoinColumn(name="liquidacion_material_id", referencedColumnName="id")
     */
    protected $liquidacion_material;
    
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

    public function __construct()
    {
        $this->estados = new ArrayCollection();
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
}
