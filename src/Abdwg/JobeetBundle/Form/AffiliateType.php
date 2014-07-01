<?php
/**
 * Created by PhpStorm.
 * User: alber
 * Date: 2014/7/1
 * Time: 下午 6:22
 */
// src\Abdwg\JobeetBundle\Form\AffiliateType.php
namespace Abdwg\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Abdwg\JobeetBundle\Entity\Affiliate;
use Abdwg\JobeetBundle\Entity\Category;

class AffiliateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url')
            ->add('email')
            ->add('categories', null, array('expanded'=>true))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'Abdwg\JobeetBundle\Entity\Affiliate',
            ));
    }

    public function getName()
    {
        return 'affiliate';
    }
}