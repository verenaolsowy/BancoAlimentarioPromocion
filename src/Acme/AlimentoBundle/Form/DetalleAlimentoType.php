<?php

namespace Acme\AlimentoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DetalleAlimentoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaVencimiento')
            ->add('contenido')
            ->add('pesoUnitario')
            ->add('stock')
            ->add('reservado')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\AlimentoBundle\Entity\DetalleAlimento'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_alimentobundle_detallealimento';
    }
}
