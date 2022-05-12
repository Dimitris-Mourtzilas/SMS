<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Course;
use App\Entity\Professor;
use App\Entity\Student;
use App\Repository\AdminRepository;
use App\Repository\CourseRepository;
use App\Repository\ProfessorRepository;
use App\Repository\StudentRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class AdminController extends AbstractController
{
    /**
     * @Route("/admin-login", name="admin_login")
     * @param Request $request
     * @param \Doctrine\Persistence\ManagerRegistry $registry
     * @return Response
     */
    public function login(Request $request, \Doctrine\Persistence\ManagerRegistry $registry): Response
    {
        if ($request->getMethod() === "POST") {
            $admin = new AdminRepository($registry);
            if ($admin->findBy(['password' => $request->request->get('password')])) return $this->redirect('/admin');
            else return $this->redirect('/admin-login');
        }
        return $this->render('admin_login.html.twig');
    }

    /**
     * @Route("/admin",name="admin_page")
     */
    public function index()
    {
        return $this->render('adminPage.html.twig');
    }

    /**
     * @Route("/add-professor",name="add_new_professor")
     * @param Professor $professor
     * @param ManagerRegistry $registry
     * @return RedirectResponse
     */
    public function addProfessor(Professor $professor, ManagerRegistry $registry)
    {
        $profRepo = new ProfessorRepository($registry);
        $profRepo->add($professor);
        return $this->redirect('/admin');
    }

    public function addCourse(Course $course, ManagerRegistry $registry)
    {
        $courseRepo = new CourseRepository($registry);
        $courseRepo->add($course);
        return $this->redirect('/admin');
    }

    public function addStudent(Student $student, ManagerRegistry $registry)
    {
        $studentRepo = new StudentRepository($registry);
        $studentRepo->add($student);
        return $this->redirect('/admin');
    }

    /**
     * @Route("/admin-register",name="admin_register")
     * @param \Doctrine\Persistence\ManagerRegistry $reg
     * @param Request $req
     */

    public function adminRegister(Request $req, \Doctrine\Persistence\ManagerRegistry $reg):Response
    {
        if ($req->getMethod() === "POST") {
            $adminRepo = new AdminRepository($reg);
            $admin = new Admin();
            $admin->setFirstName($req->request->get('first_name'));
            $admin->setLastName($req->request->get('last_name'));
            $admin->setNickName($req->request->get('nick_name'));
            $admin->setPassword($req->request->get(md5('password')));
            $adminRepo->add($admin);
            return $this->redirect('/admin-login');
        } else return $this->render('admin_register.html.twig');
    }

}
