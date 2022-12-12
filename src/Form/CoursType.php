<?php

namespace App\Form;

use App\Entity\Cours;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('ageMini')
            ->add('heureDebut')
            ->add('heureFin')
            ->add('date')
            ->add('agemaxi')
            ->add('nbplaces')
            ->add('professeur', EntityType::class, array('class' => 'App\Entity\ProfesseurCours','choice_label' => 'Compte.nom' ))
            ->add('enregistrer', SubmitType::class, array('label' => 'Nouveau cours'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
