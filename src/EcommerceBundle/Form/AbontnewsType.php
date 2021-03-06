<?php

namespace EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbontnewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anlEtat')
            ->add('anlEmail')
            ->add("anlLocale", "choice", array(
                "label" => "Langue :",
                "choices" => array(
                    "fr" => "fr - Français",
                    "en" => "en - English",
                    "de" => "de - Deutsch",
                    "it" => "it - Italiano",
                    "es" => "es - Español",
                    "pt" => "pt - Português",
                    "zh" => "zh - 中国 (Chinois)",
                    "el" => "el - ελληνικά (Grec)",
                    "ja" => "ja - 日本の (Japonais)",
                    "ko" => "ko - 한국의 (Coréen)",
                    "ru" => "ru - русский (Russe)"
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EcommerceBundle\Entity\Abontnews'
        ));
    }
}
