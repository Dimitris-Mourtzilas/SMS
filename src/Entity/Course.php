<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $title;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ects;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $semester;

    /**
     * @ORM\ManyToOne(targetEntity=Professor::class, inversedBy="course")
     */
    private $professor;

    /**
     * @ORM\ManyToMany(targetEntity=Enrolled::class, mappedBy="courses")
     */
    private $enrolleds;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getEcts(): ?int
    {
        return $this->ects;
    }

    public function setEcts(int $ects): self
    {
        $this->ects = $ects;

        return $this;
    }

    public function getSemester(): ?string
    {
        return $this->semester;
    }

    public function setSemester(string $semester): self
    {
        $this->semester = $semester;

        return $this;
    }


    public function setProfessor(Professor $professor):self{
        $this->professor = $professor;
    }
    /**
     * @return Collection<int, Enrolled>
     */
    public function getEnrolleds(): Collection
    {
        return $this->enrolleds;
    }

    /**
     * @return Professor
     */
    public function getProfessor():Professor{
        return $this->professor;
    }


    public function addEnrolled(Enrolled $enrolled): self
    {
        if (!$this->enrolleds->contains($enrolled)) {
            $this->enrolleds[] = $enrolled;
            $enrolled->addCourse($this);
        }

        return $this;
    }

    public function removeEnrolled(Enrolled $enrolled): self
    {
        if ($this->enrolleds->removeElement($enrolled)) {
            $enrolled->removeCourse($this);
        }

        return $this;
    }
}
