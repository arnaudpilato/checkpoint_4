<?php

namespace App\Form;

use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CarouselType extends AbstractType
{
    public const HOME_PAGE = 'Accueil';
    public const CLUB_PAGE = 'Club';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('page', ChoiceType::class, [
                'label' => 'Choisir une page',
                'choices' => [
                    'Accueil' => self::HOME_PAGE,
                    'Club' => self::CLUB_PAGE,
                ]])
            ->add('pathFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
                'label' => 'Image à télécharger'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Carousel::class,
        ]);
    }
}
