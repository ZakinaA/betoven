<?php

namespace App\Form;

use App\Entity\Compte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mail',EmailType::class, array('label' => 'Adresse mail','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
            ->add('nom',TextType::class, array('label' => 'Nom','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))
            ->add('prenom',TextType::class, array('label' => 'Prenom','row_attr' => ['class' => 'mb-3'],'label_attr' => ['class' => 'form-label'], 'attr' => array('class' => 'form-control rounded-pill')))


            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password','class' => 'form-control rounded-pill'],
                'row_attr' => ['class' => 'mb-3'],
                'label_attr' => ['class' => 'form-label'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('numRue',TextType::class, array('label' => false ,'row_attr' => ['class' => 'col-md-4'], 'attr' => array('class' => 'form-control rounded-pill', 'placeholder' => 'Numéro de rue')))
            ->add('rue',TextType::class, array('label' => false ,'row_attr' => ['class' => 'col-md-8'], 'attr' => array('class' => 'form-control rounded-pill', 'placeholder' => 'Nom de rue')))
            ->add('ville',TextType::class, array('label' => false ,'row_attr' => ['class' => 'col-md-8'], 'attr' => array('class' => 'form-control rounded-pill', 'placeholder' => 'Ville')))
            
            ->add('copos',TextType::class, array('label' => 'Code Postal' ,'label_attr' => ['class' => 'form-label'],'row_attr' => ['class' => 'mb-3'], 'attr' => array('id' => 'task-form','class' => 'form-control rounded-pill', 'oninput' => 'trouverVilleAvecCodePostalFunc()')))
            ->add('tel',TextType::class, array('label' => 'Numéro de téléphone' ,'label_attr' => ['class' => 'form-label'],'row_attr' => ['class' => 'mb-3'], 'attr' => array('class' => 'form-control rounded-pill')))

            //->add('ville',ChoiceType::class, array('label' => 'Ville' ,'label_attr' => ['class' => 'form-label'],'row_attr' => ['class' => 'mb-3'], 'attr' => array('class' => 'form-select rounded-pill')))

            /*->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
