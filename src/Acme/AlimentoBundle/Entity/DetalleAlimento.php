<?php

namespace Acme\AlimentoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleAlimento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\AlimentoBundle\Entity\DetalleAlimentoRepository")
 */
class DetalleAlimento
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date")
     */
    private $fechaVencimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="string", length=200)
     */
    private $contenido;

    /**
     * @var string
     *
     * @ORM\Column(name="peso_unitario", type="decimal")
     */
    private $pesoUnitario;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var integer
     *
     * @ORM\Column(name="reservado", type="integer")
     */
    private $reservado;


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
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     * @return DetalleAlimento
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime 
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return DetalleAlimento
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set pesoUnitario
     *
     * @param string $pesoUnitario
     * @return DetalleAlimento
     */
    public function setPesoUnitario($pesoUnitario)
    {
        $this->pesoUnitario = $pesoUnitario;

        return $this;
    }

    /**
     * Get pesoUnitario
     *
     * @return string 
     */
    public function getPesoUnitario()
    {
        return $this->pesoUnitario;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return DetalleAlimento
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set reservado
     *
     * @param integer $reservado
     * @return DetalleAlimento
     */
    public function setReservado($reservado)
    {
        $this->reservado = $reservado;

        return $this;
    }

    /**
     * Get reservado
     *
     * @return integer 
     */
    public function getReservado()
    {
        return $this->reservado;
    }
}
