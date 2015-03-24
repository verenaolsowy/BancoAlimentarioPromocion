<?php

namespace Acme\AlimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlimentoDonante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\AlimentoBundle\Entity\AlimentoDonanteRepository")
 */
class AlimentoDonante
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
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="DetalleAlimento", inversedBy="alimentosDonante")
     * @ORM\JoinColumn(name="detalle_alimento_id", referencedColumnName="id")
     */
    private $detalle_alimento_id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="\Acme\DonanteBundle\Entity\Donante", inversedBy="alimentosDonante")
     * @ORM\JoinColumn(name="donante_id", referencedColumnName="id")
     */
    private $donante_id;


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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return AlimentoDonante
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set detalle_alimento_id
     *
     * @param \Acme\AlimentoBundle\Entity\DetalleAlimento $detalleAlimentoId
     * @return AlimentoDonante
     */
    public function setDetalleAlimentoId(\Acme\AlimentoBundle\Entity\DetalleAlimento $detalleAlimentoId = null)
    {
        $this->detalle_alimento_id = $detalleAlimentoId;

        return $this;
    }

    /**
     * Get detalle_alimento_id
     *
     * @return \Acme\AlimentoBundle\Entity\DetalleAlimento 
     */
    public function getDetalleAlimentoId()
    {
        return $this->detalle_alimento_id;
    }

    /**
     * Set donante_id
     *
     * @param \Acme\DonanteBundle\Entity\Donante $donanteId
     * @return AlimentoDonante
     */
    public function setDonanteId(\Acme\DonanteBundle\Entity\Donante $donanteId = null)
    {
        $this->donante_id = $donanteId;

        return $this;
    }

    /**
     * Get donante_id
     *
     * @return \Acme\DonanteBundle\Entity\Donante 
     */
    public function getDonanteId()
    {
        return $this->donante_id;
    }
}
