<?php

namespace Petramas\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
