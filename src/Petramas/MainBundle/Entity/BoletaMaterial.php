<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BoletaMaterial
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Petramas\MainBundle\Repository\BoletaMaterialRepository")
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
     * @ORM\ManyToOne(targetEntity="BoletaRecepcion", inversedBy="boleta_materiales")
     * @ORM\JoinColumn(name="boleta_recepcion_id", referencedColumnName="id")
     */
    protected $boleta_recepcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Tarifa", inversedBy="boleta_materiales")
     * @ORM\JoinColumn(name="tarifa_id", referencedColumnName="id")
     */
    protected $tarifa;
    
    /**
     * @var float
     *
     * @ORM\Column(name="neto", type="decimal", precision=10, scale=2)
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

    /**
     * Set boleta_recepcion
     *
     * @param \Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepcion
     * @return BoletaMaterial
     */
    public function setBoletaRecepcion(\Petramas\MainBundle\Entity\BoletaRecepcion $boletaRecepcion = null)
    {
        $this->boleta_recepcion = $boletaRecepcion;
    
        return $this;
    }

    /**
     * Get boleta_recepcion
     *
     * @return \Petramas\MainBundle\Entity\BoletaRecepcion 
     */
    public function getBoletaRecepcion()
    {
        return $this->boleta_recepcion;
    }

    /**
     * Set tarifa
     *
     * @param \Petramas\MainBundle\Entity\Tarifa $tarifa
     * @return BoletaMaterial
     */
    public function setTarifa(\Petramas\MainBundle\Entity\Tarifa $tarifa = null)
    {
        $this->tarifa = $tarifa;
    
        return $this;
    }

    /**
     * Get tarifa
     *
     * @return \Petramas\MainBundle\Entity\Tarifa 
     */
    public function getTarifa()
    {
        return $this->tarifa;
    }
}