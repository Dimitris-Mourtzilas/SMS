<?php

namespace App\Entity;

use App\Repository\ProfessorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessorRepository::class)
 */
class Professor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string",length=25)
     *
     */

    private $first_name;
    /**
     * @ORM\Column(type="string",length=25)
     *
     */

    private $last_name;
    /**
     * @ORM\Column(type="string",length=10)
     *
     */

    private $nick_name;
    /**
     * @ORM\Column(type="string",length=255)
     *
     */

    private $password;

    /**
     * @ORM\Column(type="integer")
     *
     */


    /**
     * @ORM\Column(type="float")
     */
    private $salary;

    private $age;
    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getNickName()
    {
        return $this->nick_name;
    }

    /**
     * @param mixed $nick_name
     */
    public function setNickName($nick_name): void
    {
        $this->nick_name = $nick_name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }





    /**
     * @ORM\OneToMany(targetEntity=Course::class, mappedBy="professors")
     */
    private  $courses;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->courses = new ArrayCollection();
//        $this->enrolleds = new ArrayCollection();
    }

    public function getSalary(): ?float
    {
        return $this->salary;
    }

    public function setSalary(float $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * @return Collection<int, Professor>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }


    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            if ($course->getProfessor() === $this) {
                $course->setProfessor(null);
            }
        }

        return $this;
    }

    /**
     * @param Course $course
     * @return $this
     */
    public function addCourse(Course $course): self
    {
        if(!$this->courses->contains($course)) {
            if (!empty($courses)) {
                $this->$courses[] = $course;
            }
            $course->setProfessor($this);
        }
        return $this;
    }

}