<?php

namespace App\Controller;

use App\Entity\CreateGroup;
use App\Form\CreateGroupType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\VarDumper\Cloner\Data;

class GroupController extends AbstractController
{
    #[Route('/group', name: 'group')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $entity = new CreateGroup();
        $form = $this->createForm(CreateGroupType::class, $entity);
        // dump($form->get('member_invited')->getData());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entity->setMember($this->getUser());
            $entityManager->persist($entity);
            $entityManager->flush();
        }
        return $this->render('group/index.html.twig', [
            'controller_name' => 'GroupController',
            'form' => $form->createView()
        ]);
    }
}
