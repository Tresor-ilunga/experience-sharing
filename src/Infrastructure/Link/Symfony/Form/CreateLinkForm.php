<?php

declare(strict_types=1);

namespace Infrastructure\Link\Symfony\Form;

use Application\Link\Command\CreateLinkCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * class CreateLinkForm.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class CreateLinkForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url', UrlType::class, [
                'label' => 'link.forms.labels.url',
            ])
            ->add('slug', TextType::class, [
                'label' => 'link.forms.labels.slug',
                'required' => false,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'link.forms.labels.description',
                'required' => false,
            ])
            ->add('has_automatic_redirect', CheckboxType::class, [
                'label' => 'link.forms.labels.has_automatic_redirect',
                'required' => false,
            ])
            ->add('redirect_delay', NumberType::class, [
                'label' => 'link.forms.labels.redirect_delay',
                'required' => false,
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CreateLinkCommand::class,
            'translation_domain' => 'link'
        ]);
    }
}