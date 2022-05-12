<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    /**
     * @Route("/course", name="app_course")
     */
    public function index(): Response
    {
        return $this->render('course/admin_index.html.twig', [
            'controller_name' => 'CourseController',
        ]);
    }

    /**
     * @Route("/list",name="courses_list")
     * @param ManagerRegistry $registry
     * @return Response
     */
    public function listCourses(ManagerRegistry $registry){
        $courseRepo = new CourseRepository($registry);
        return $this->render('courses.html.twig',['courses'=>$courseRepo->findAll()]);
    }
}
