<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
    //  * @IsGranted("ROLE_USER")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            // 'user' => $user
        ]);
    }

    /**
     * @Route("/user", name="profil")
    //  * @IsGranted("ROLE_USER")
     */
    public function profil()
    {
        return $this->render('home/profil.html.twig', []);
    }

    /**
     * @Route("/admin", name="admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function adminPanel()
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('admin/index.html.twig', [
            'users' => $users
        ]);
    }
}
