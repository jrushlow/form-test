<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Bar;
use App\Entity\Baz;
use App\Entity\Foo;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FrontController
 *
 * @package App\Controller
 * @author  Jesse Rushlow <jr@geeshoe.com>
 */
class FrontController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @return Response
     */
    public function index(ObjectManager $manager): Response
    {
        $allFoo = $manager->getRepository(Foo::class)
            ->findAll();

        $allBar = $manager->getRepository(Bar::class)
            ->findAll();

        return $this->render('base.html.twig', [
            'allFoo' => $allFoo,
            'allBar' => $allBar
        ]);
    }
}
