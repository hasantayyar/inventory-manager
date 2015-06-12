<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ItemType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $myEntity = $builder->getForm()->getData();
        $builder
                ->add('name')
                ->add('type', 'choice', array(
                    'attr' => ['class' => 'iconselector'],
                    'choices' => ['food' => 'Food', 'other' => 'Other', 'office' => 'Office Object']
                ))
                ->add('stock')
                ->add('stockType', 'choice', array(
                    'attr' => ['class' => 'iconselector'],
                    'choices' => ['number' => 'Number', 'gr' => 'Gr', 'kg' => 'Kg', 'm' => 'Meter', 'cm' => 'Centimeter', 'lt' => 'Liter', 'ounce' => 'Ounce']
                ))
                ->add('photo', 'comur_image', array(
                    'uploadConfig' => array(
                        'uploadRoute' => 'comur_api_upload', //optional
                        'uploadUrl' => $myEntity->getUploadRootDir(), // required - see explanation below (you can also put just a dir path)
                        'webDir' => $myEntity->getUploadDir(), // required - see explanation below (you can also put just a dir path)
                        'fileExt' => '*.jpg;*.gif;*.png;*.jpeg', //optional
                        'libraryDir' => null, //optional
                        'libraryRoute' => 'comur_api_image_library', //optional
                        'showLibrary' => true, //optional
                    //  'saveOriginal' => 'originalImage'           //optional
                    ),
                    'cropConfig' => array(
                        'minWidth' => 600,
                        'minHeight' => 600,
                        'aspectRatio' => true, //optional
                        'cropRoute' => 'comur_api_crop', //optional
                        'forceResize' => false, //optional
                        'thumbs' => array(//optional
                            array(
                                'maxWidth' => 200,
                                'maxHeight' => 200
                            ),
                            array(
                                'maxWidth' => 100,
                                'maxHeight' => 100,
                                'useAsFieldImage' => true  //optional
                            )
                        )
                    )
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Item'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_item';
    }

}
