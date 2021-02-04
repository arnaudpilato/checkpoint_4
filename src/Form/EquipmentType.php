<?php

namespace App\Form;

use App\Entity\Equipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class EquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('brand', TextType::class, [
                'label' => 'Marque'
            ])
            ->add('pictureFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
                'label' => 'Image à télécharger'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
        ]);
    }
}
