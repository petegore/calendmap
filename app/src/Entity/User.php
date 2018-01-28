<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Agenda", mappedBy="owner")
     *
     * @var ArrayCollection|Agenda[]|null
     */
    protected $agendas;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Agenda", mappedBy="coOwners")
     *
     * @var ArrayCollection|Agenda[]|null
     */
    protected $sharedAgendas;

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    protected $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $isActive;

    public function __construct()
    {
        $this->isActive = true;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

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
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        return (in_array($role, $this->getRoles()));
    }

    /**
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('ROLE_SUPER_ADMIN');
    }

    public function eraseCredentials()
    {

    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(
            array(
                $this->id,
                $this->username,
                $this->password,
                //$this->isActive,
                // see section on salt below
                // $this->salt,
            )
        );
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            //$this->isActive,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    /**
     * @return Agenda[]|ArrayCollection|null
     */
    public function getAgendas()
    {
        return $this->agendas;
    }

    /**
     * @param Agenda[]|ArrayCollection|null $agendas
     *
     * @return User
     */
    public function setAgendas($agendas)
    {
        $this->agendas = $agendas;

        return $this;
    }

    /**
     * @return Agenda[]|ArrayCollection|null
     */
    public function getSharedAgendas()
    {
        return $this->sharedAgendas;
    }

    /**
     * @param Agenda[]|ArrayCollection|null $sharedAgendas
     *
     * @return User
     */
    public function setSharedAgendas($sharedAgendas)
    {
        $this->sharedAgendas = $sharedAgendas;

        return $this;
    }

    /**
     * @param Agenda $sharedAgenda
     *
     * @return User
     */
    public function addSharedAgenda(Agenda $sharedAgenda)
    {
        if (!$this->sharedAgendas->contains($sharedAgenda)) {
            $this->sharedAgendas->add($sharedAgenda);
        }

        return $this;
    }

    /**
     * @param Agenda $sharedAgenda
     *
     * @return $this
     */
    public function removeSharedAgenda(Agenda $sharedAgenda)
    {
        if ($this->sharedAgendas->contains($sharedAgenda)) {
            $this->sharedAgendas->removeElement($sharedAgenda);
            // no verification for user cause it's already done on Agenda entity
        }

        return $this;
    }
}