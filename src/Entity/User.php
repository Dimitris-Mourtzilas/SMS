<?php


namespace App\Entity;


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */

    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private  $first_name;
/**
 * @ORM\Column(type="string")
 */
    private $last_name;
/**
 * @ORM\Column(type="string")
 */
    private $nick_name;
/**
 * @ORM\Column(type="integer")
 */
    private $age;
/**
 * @ORM\Column(type="integer")
 */
    private $role;

    /**
     * @ORM\Column(type="string",length=255)
     */

    private $password;

    protected const roles = [
        '0' => 'admin',
        '1' => 'professor',
        '2' => 'student'
    ];
/**
 * @param string|null $first_name
 */

    public function setFirstName(?string $first_name){
        $this->first_name = $first_name;
    }
/**
 * @param string|null $last_name
 */
    public function setLastName(?string $last_name){
        $this->last_name = $last_name;
    }
/**
 * @param string|null $nick_name
 */
    public function setNickName(?string $nick_name){
        $this->nick_name= $nick_name;
    }
/**
 * @param int|null $age
 */
    public function setAge(?int $age){
        $this->age = $age;
    }
/**
 * @param int|null $role
 */
    public function setRole(?int $role){
        $this->role = $role;
    }

/**
 * @return string|null
 */
    public function getFirstName(): ?string{
        return $this->first_name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string{
        return $this->last_name;
    }
/**
 * @return string|null
 */
    public function getNickName(): ?string{
        return $this->nick_name;
    }
/**
 * @return int|null
 */
    public function getAge(): ?int{
        return $this->age;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string{
        return self::roles[$this->role];
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


}