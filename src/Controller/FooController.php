<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Foo;
use App\Form\FooType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooController extends AbstractController
{
    /**
     * @Route("/foo/form", name="foo_form")
     * @Route("/foo/update/{id}", name="foo_update")
     *
     * @param Request       $request
     * @param ObjectManager $manager
     * @param Foo|null      $foo
     *
     * @return Response
     */
    public function form(Request $request, ObjectManager $manager, Foo $foo = null): Response
    {
        if ($foo === null) {
            $foo = new Foo();
        }

        $form = $this->createForm(FooType::class, $foo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $manager->persist($data);
            $manager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
