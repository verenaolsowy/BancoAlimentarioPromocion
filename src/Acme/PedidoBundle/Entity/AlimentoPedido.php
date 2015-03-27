<?php

namespace Acme\PedidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlimentoPedido
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\PedidoBundle\Entity\AlimentoPedidoRepository")
 */
class AlimentoPedido
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
     * @ORM\ManyToOne(targetEntity="PedidoModelo", inversedBy="pedidosAlimento")
     * @ORM\JoinColumn(name="pedido_modelo_numero", referencedColumnName="numero")
     */
    private $pedido_modelo_numero;

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
     * @return AlimentoPedido
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
     * Set pedido_numero
     *
     * @param \Acme\PedidoBundle\Entity\PedidoModelo $pedidoNumero
     * @return AlimentoPedido
     */
    public function setPedidoNumero(\Acme\PedidoBundle\Entity\PedidoModelo $pedidoNumero = null)
    {
        $this->pedido_numero = $pedidoNumero;

        return $this;
    }

    /**
     * Get pedido_numero
     *
     * @return \Acme\PedidoBundle\Entity\PedidoModelo 
     */
    public function getPedidoNumero()
    {
        return $this->pedido_numero;
    }

    /**
     * Set detalle_alimento_id
     *
     * @param \Acme\AlimentoBundle\Entity\DetalleAlimento $detalleAlimentoId
     * @return AlimentoPedido
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
     * Set pedido_modelo_numero
     *
     * @param \Acme\PedidoBundle\Entity\PedidoModelo $pedidoModeloNumero
     * @return AlimentoPedido
     */
    public function setPedidoModeloNumero(\Acme\PedidoBundle\Entity\PedidoModelo $pedidoModeloNumero = null)
    {
        $this->pedido_modelo_numero = $pedidoModeloNumero;

        return $this;
    }

    /**
     * Get pedido_modelo_numero
     *
     * @return \Acme\PedidoBundle\Entity\PedidoModelo 
     */
    public function getPedidoModeloNumero()
    {
        return $this->pedido_modelo_numero;
    }
}
