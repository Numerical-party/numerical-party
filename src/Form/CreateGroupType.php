<?php

namespace App\Form;

use App\Entity\CreateGroup;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('member_invited', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nickname',
                'query_builder' => function (EntityRepository $repository) {
                    $qb = $repository->createQueryBuilder('u');
                    // the function returns a QueryBuilder object
                    return $qb
                        // find all users where 'deleted' is NOT '1'
                        // ->where($qb->expr()->neq('u.id', '?1'))
                        ->where('u.id != 1')
                        // ->setParameter('1', '1')
                        ->orderBy('u.nickname', 'ASC');
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CreateGroup::class,
        ]);
    }
}
