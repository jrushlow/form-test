<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Bar;
use App\Form\BarType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{
    /**
     * @Route("/bar/form", name="bar_form")
     * @Route("/bar/update/{id}", name="bar_update")
     *
     * @param Request       $request
     * @param ObjectManager $manager
     * @param Bar|null      $bar
     *
     * @return Response
     * @throws \Exception
     */
    public function form(Request $request, ObjectManager $manager, Bar $bar = null): Response
    {
        if ($bar === null) {
            $bar = new Bar();
        }

        $form = $this->createForm(BarType::class, $bar);

        $form->handleRequest($request);

        /*
         * When creating a new form, isValid() returns false because, Bar->id
         * is not auto-generated as defined in the entity.
         *
         * However, when updating a Bar, isValid() returns true as Bar->id
         * already exists and was provided as a hidden field in the form.
         */
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            //Id is not auto generated, so we set Bar->id here.
            if ($data->getId() === null) {
                $data->setId(random_int(1, 1000));
            }

            $manager->persist($data);
            $manager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
