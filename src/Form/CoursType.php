<?php

namespace App\Form;

use App\Entity\Cours;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, array('label' => 'Nom du cours','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
            ->add('ageMini', IntegerType::class, array('label' => 'Age minimum','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
            ->add('date', DateType::class, [
                'label' => 'Date du cours',
                'row_attr' => ['class' => 'mb-3'],
                'label_attr' => ['class' => 'form-label'], 
                'widget' => 'single_text', 
                'attr' => array('class' => 'form-control rounded-pill', 'type' => 'date')                
            ])
            ->add('heureDebut', TimeType::class, [
                'label' => 'Heure de début',
                'with_seconds' => true, 
                'row_attr' => ['class' => 'mb-3'],
                'label_attr' => ['class' => 'form-label'], 
                'widget' => 'single_text', 
                'attr' => array('class' => 'form-control rounded-pill', 'type' => 'time')                
            ])
            ->add('heureFin', TimeType::class, [
                'label' => 'Heure de fin',
                'row_attr' => ['class' => 'mb-3'],
                'with_seconds' => true, 
                'label_attr' => ['class' => 'form-label'], 
                'widget' => 'single_text', 
                'attr' => array('class' => 'form-control rounded-pill', 'type' => 'time')                
            ])
            ->add('agemaxi', IntegerType::class, array('label' => 'Age maximum','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
            ->add('nbplaces', IntegerType::class, array('label' => 'Nombre de places disponibles','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
            ->add('professeur', EntityType::class, array('class' => 'App\Entity\ProfesseurCours','choice_label' => 'Compte.nom' ,'row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-select rounded-pill')))
            ->add('enregistrer', SubmitType::class, array('label' => 'Créer le cours','row_attr' => ['class' => 'mt-3 mb-0'], 'attr' => array('class' => 'btn btn-primary shadow-none rounded-pill float-end')))

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
