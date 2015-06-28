<?php

namespace Fisi\SigriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Fisi\SigriBundle\Form\PersonalOTIType;

class EmpleadoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidopaterno')
            ->add('apellidomaterno')
            ->add('telefono')
            ->add('email')
            ->add('direccion')
            ->add('unidadOrganica')
            ->add('username')
            ->add('password')
            #->add('salt') 
            ->add('user_roles')
            ->add('personaloti', new PersonalOTIType(), array('data_class' => 'Fisi\SigriBundle\Entity\PersonalOTI' ,  'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fisi\SigriBundle\Entity\Empleado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fisi_sigribundle_empleado';
    }
}
