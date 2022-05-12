<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="app_student")
     */
    public function index(): Response
    {
        return $this->render('student/admin_index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }


    public function addCourse(?Course $course, ManagerRegistry $registry){
        $courseRepo = new CourseRepository($registry);
        $courseRepo->add($course);
        return $this->redirect('/student');
    }

    

}
