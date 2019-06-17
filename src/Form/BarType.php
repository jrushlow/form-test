<?php
declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BarType
 *
 * @package App\Form
 * @author  Jesse Rushlow <jr@geeshoe.com>
 */
class BarType extends AbstractType
{
    /**
     * {@inheritDoc}
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', HiddenType::class, [
                'mapped' => false,
                'required' => false
            ])
            ->add('name', TextType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Submit Foo'
            ])
        ;
    }
}
