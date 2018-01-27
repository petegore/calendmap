<?php
namespace App\Entity;

use App\Entity\Embeddable\Address;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Contains an agenda
 *
 * @ORM\Table(name="app_agendas")
 * @ORM\Entity(repositoryClass="App\Repository\AgendaRepository")
 */
class Agenda
{
    use TimestampableEntity,
        BlameableEntity,
        SoftDeleteableEntity
    ;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="agendas")
     * @ORM\JoinColumn(name="owner", referencedColumnName="id")
     *
     * @var User
     */
    protected $owner;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="shared_agendas")
     * @ORM\JoinTable(name="app_co_owners")
     *
     * @var ArrayCollection|User[]|null
     */
    protected $coOwners;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="agenda")
     *
     * @var ArrayCollection|Event[]|null
     */
    protected $events;

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $id;

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return Agenda
     */
    public function setOwner(User $owner): Agenda
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return User[]|ArrayCollection|null
     */
    public function getCoOwners()
    {
        return $this->coOwners;
    }

    /**
     * @param User[]|ArrayCollection|null $coOwners
     * @return Agenda
     */
    public function setCoOwners($coOwners): Agenda
    {
        $this->coOwners = $coOwners;

        return $this;
    }

    /**
     * @param User $coOwner
     *
     * @return Agenda
     */
    public function addCoOwner($coOwner): Agenda
    {
        if (!$this->coOwners->contains($coOwner)) {
            $this->coOwners->add($coOwner);
        }
        $coOwner->addSharedAgenda($this);

        return $this;
    }

    /**
     * @param User $coOwner
     *
     * @return Agenda
     */
    public function removeCoOwner($coOwner): Agenda
    {
        if ($this->coOwners->contains($coOwner)) {
            $this->coOwners->removeElement($coOwner);
        }
        $coOwner->removeSharedAgenda($this);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Agenda
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Event[]|ArrayCollection|null
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param Event $event
     * @return Agenda
     */
    public function addEvent($event): Agenda
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setAgenda($this);
        }

        return $this;
    }

    /**
     * @param Event $event
     * @return Agenda
     */
    public function removeEvent($event): Agenda
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
        }

        return $this;
    }
}