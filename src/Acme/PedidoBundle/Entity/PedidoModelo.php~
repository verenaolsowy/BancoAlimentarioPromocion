<?php

namespace Acme\PedidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PedidoModelo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\PedidoBundle\Entity\PedidoModeloRepository")
 */
class PedidoModelo
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
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date")
     */
    private $fechaIngreso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="con_envio", type="boolean")
     */
    private $conEnvio;


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
     * Set numero
     *
     * @param integer $numero
     * @return PedidoModelo
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return PedidoModelo
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set conEnvio
     *
     * @param boolean $conEnvio
     * @return PedidoModelo
     */
    public function setConEnvio($conEnvio)
    {
        $this->conEnvio = $conEnvio;

        return $this;
    }

    /**
     * Get conEnvio
     *
     * @return boolean 
     */
    public function getConEnvio()
    {
        return $this->conEnvio;
    }
}
