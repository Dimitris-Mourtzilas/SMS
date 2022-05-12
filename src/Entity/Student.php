<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
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

    private $age;

    /**
     * @ORM\Column(type="float")
     */
    private $gpa;

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
