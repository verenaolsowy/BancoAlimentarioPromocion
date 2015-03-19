<?php

namespace Acme\DonanteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DonanteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('razonSocial')
            ->add('apellidoContacto')
            ->add('nombreContacto')
            ->add('telefonoContacto')
            ->add('mailContacto')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\DonanteBundle\Entity\Donante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_donantebundle_donante';
    }
}
