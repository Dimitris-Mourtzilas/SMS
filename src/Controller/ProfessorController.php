<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessorController extends AbstractController
{
    /**
     * @Route("/professor", name="prof_login")
     */
    public function index(): Response
    {
        return $this->render('professor/index.html.twig', [
            'controller_name' => 'ProfessorController',
        ]);
    }
}
