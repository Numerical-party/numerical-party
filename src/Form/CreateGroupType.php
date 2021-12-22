<?php

namespace App\Form;

use App\Entity\CreateGroup;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class CreateGroupType extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $this->security->getUser();
        $userId = reset($user);
        $builder
            ->add('member_invited', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nickname',
                'query_builder' => function (EntityRepository $repository) use ($userId) {
                    $qb = $repository->createQueryBuilder('u');
                    return $qb
                        ->where('u.id !=' . $userId)
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
