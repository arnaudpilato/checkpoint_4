<?php

namespace App\Form;

use App\Entity\Club;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ClubType extends AbstractType
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
            ->add('longitude', NumberType::class, [
                'label' => 'Longitude'
            ])
            ->add('latitude', NumberType::class, [
                'label' => 'Latitude'
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
            'data_class' => Club::class,
        ]);
    }
}
