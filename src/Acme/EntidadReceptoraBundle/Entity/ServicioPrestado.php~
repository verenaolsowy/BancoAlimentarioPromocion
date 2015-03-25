<?php

namespace Acme\EntidadReceptoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicioPrestado
 */
class ServicioPrestado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $descripcion;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return ServicioPrestado
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $entidadesReceptoras;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entidadesReceptoras = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add entidadesReceptoras
     *
     * @param \Acme\EntidadReceptoraBundle\Entity\EntidadReceptora $entidadesReceptoras
     * @return ServicioPrestado
     */
    public function addEntidadesReceptora(\Acme\EntidadReceptoraBundle\Entity\EntidadReceptora $entidadesReceptoras)
    {
        $this->entidadesReceptoras[] = $entidadesReceptoras;

        return $this;
    }

    /**
     * Remove entidadesReceptoras
     *
     * @param \Acme\EntidadReceptoraBundle\Entity\EntidadReceptora $entidadesReceptoras
     */
    public function removeEntidadesReceptora(\Acme\EntidadReceptoraBundle\Entity\EntidadReceptora $entidadesReceptoras)
    {
        $this->entidadesReceptoras->removeElement($entidadesReceptoras);
    }

    /**
     * Get entidadesReceptoras
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntidadesReceptoras()
    {
        return $this->entidadesReceptoras;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $entidades_receptoras;


}
