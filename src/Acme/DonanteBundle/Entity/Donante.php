<?php

namespace Acme\DonanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\DonanteBundle\Entity\DonanteRepository")
 */
class Donante
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
     * @var string
     *
     * @ORM\Column(name="razon_social", type="string", length=100)
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_contacto", type="string", length=100)
     */
    private $apellidoContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_contacto", type="string", length=50)
     */
    private $nombreContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_contacto", type="string", length=30)
     */
    private $telefonoContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_contacto", type="string", length=50)
     */
    private $mailContacto;


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
     * @return Donante
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
     * Set apellidoContacto
     *
     * @param string $apellidoContacto
     * @return Donante
     */
    public function setApellidoContacto($apellidoContacto)
    {
        $this->apellidoContacto = $apellidoContacto;

        return $this;
    }

    /**
     * Get apellidoContacto
     *
     * @return string 
     */
    public function getApellidoContacto()
    {
        return $this->apellidoContacto;
    }

    /**
     * Set nombreContacto
     *
     * @param string $nombreContacto
     * @return Donante
     */
    public function setNombreContacto($nombreContacto)
    {
        $this->nombreContacto = $nombreContacto;

        return $this;
    }

    /**
     * Get nombreContacto
     *
     * @return string 
     */
    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }

    /**
     * Set telefonoContacto
     *
     * @param string $telefonoContacto
     * @return Donante
     */
    public function setTelefonoContacto($telefonoContacto)
    {
        $this->telefonoContacto = $telefonoContacto;

        return $this;
    }

    /**
     * Get telefonoContacto
     *
     * @return string 
     */
    public function getTelefonoContacto()
    {
        return $this->telefonoContacto;
    }

    /**
     * Set mailContacto
     *
     * @param string $mailContacto
     * @return Donante
     */
    public function setMailContacto($mailContacto)
    {
        $this->mailContacto = $mailContacto;

        return $this;
    }

    /**
     * Get mailContacto
     *
     * @return string 
     */
    public function getMailContacto()
    {
        return $this->mailContacto;
    }
}
