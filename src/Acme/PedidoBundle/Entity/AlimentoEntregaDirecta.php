<?php

namespace Acme\PedidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlimentoEntregaDirecta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\PedidoBundle\Entity\AlimentoEntregaDirectaRepository")
 */
class AlimentoEntregaDirecta
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
     * @ORM\ManyToOne(targetEntity="Acme\AlimentoBundle\Entity\DetalleAlimento", inversedBy="alimentosPedido")
     * @ORM\JoinColumn(name="detalle_alimento_id", referencedColumnName="id")
     */
    private $detalle_alimento_id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="EntregaDirecta", inversedBy="entregasDirectaAlimento")
     * @ORM\JoinColumn(name="entrega_directa_id", referencedColumnName="id")
     */
    private $entrega_directa_id;

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
     * @return AlimentoEntregaDirecta
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
     * @return AlimentoEntregaDirecta
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
     * Set entrega_directa_id
     *
     * @param \Acme\PedidoBundle\Entity\EntregaDirecta $entregaDirectaId
     * @return AlimentoEntregaDirecta
     */
    public function setEntregaDirectaId(\Acme\PedidoBundle\Entity\EntregaDirecta $entregaDirectaId = null)
    {
        $this->entrega_directa_id = $entregaDirectaId;

        return $this;
    }

    /**
     * Get entrega_directa_id
     *
     * @return \Acme\PedidoBundle\Entity\EntregaDirecta 
     */
    public function getEntregaDirectaId()
    {
        return $this->entrega_directa_id;
    }
}
