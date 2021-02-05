<?php

namespace App\Form;

use App\Entity\Home;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class HomeType extends AbstractType
{
    public const HOME_PAGE = 'home';
    public const CLUB_PAGE = 'club';
    public const DISCIPLINE_PAGE = 'discipline';
    public const EQUIPMENT_PAGE = 'equipment';
    public const BRAND_PAGE = 'brand';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('pictureFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
                'label' => 'Image à télécharger'
            ])
            ->add('path', ChoiceType::class, [
                'label' => 'Page',
                'choices' => [
                    'Accueil' => self::HOME_PAGE,
                    'Club' => self::CLUB_PAGE,
                    'Discipline' => self::DISCIPLINE_PAGE,
                    'Equipment' => self::EQUIPMENT_PAGE,
                    'Marque' => self::BRAND_PAGE,
                ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
