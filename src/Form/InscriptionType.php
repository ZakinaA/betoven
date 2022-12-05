<?php

namespace App\Form;

use App\Entity\Compte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail',EmailType::class, array('label' => 'Adresse mail','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
            ->add('nom',TextType::class, array('label' => 'Nom','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
            ->add('prenom',TextType::class, array('label' => 'Prenom','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
