<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $gpa;

    /**
     * @ORM\ManyToMany(targetEntity=Enrolled::class, mappedBy="students")
     */
    private $enrolleds;

    public function __construct()
    {
        $this->enrolleds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getGpa(): ?float
    {
        return $this->gpa;
    }

    public function setGpa(float $gpa): self
    {
        $this->gpa = $gpa;

        return $this;
    }

    /**
     * @return Collection<int, Enrolled>
     */
    public function getEnrolleds(): Collection
    {
        return $this->enrolleds;
    }

    public function addEnrolled(Enrolled $enrolled): self
    {
        if (!$this->enrolleds->contains($enrolled)) {
            $this->enrolleds[] = $enrolled;
            $enrolled->addStudent($this);
        }

        return $this;
    }

    public function removeEnrolled(Enrolled $enrolled): self
    {
        if ($this->enrolleds->removeElement($enrolled)) {
            $enrolled->removeStudent($this);
        }

        return $this;
    }
}
