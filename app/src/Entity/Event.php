<?php
namespace App\Entity;

use App\Entity\Embeddable\Address;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Contains an event inside an agenda
 *
 * @ORM\Table(name="app_events")
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    use TimestampableEntity,
        BlameableEntity,
        SoftDeleteableEntity
    ;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Agenda", inversedBy="events")
     * @ORM\JoinColumn(name="agenda", referencedColumnName="id")
     *
     * @var Agenda
     */
    protected $agenda;

    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $beginDate;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $endDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string
     */
    protected $description;

    /**
     * @ORM\Embedded(class = "App\Entity\Embeddable\Address")
     *
     * @var Address
     */
    protected $location;

    /**
     * Event constructor.
     *
     * @param Agenda      $agenda
     * @param \Datetime   $beginDate
     * @param \Datetime   $endDate
     * @param Address     $location
     * @param string|null $description
     *
     * @return Event
     */
    public function __construct(
        Agenda $agenda,
        \Datetime $beginDate,
        \Datetime $endDate,
        Address $location,
        $description = null
    ) {
        $this->agenda = $agenda;
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->location = $location;
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Event
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBeginDate(): \DateTime
    {
        return $this->beginDate;
    }

    /**
     * @param \DateTime $beginDate
     * @throws \LogicException
     * @return Event
     */
    public function setBeginDate(\DateTime $beginDate): Event
    {
        if ($beginDate === null) {
            throw new \LogicException("Begin date cannot be set to null.");
        }
        $this->beginDate = $beginDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \Datetime
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     * @throws \LogicException
     * @return Event
     */
    public function setEndDate(\DateTime $endDate): Event
    {
        if ($endDate === null) {
            throw new \LogicException("End date cannot be set to null.");
        }
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Event
     */
    public function setDescription(string $description): Event
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Address
     */
    public function getLocation(): Address
    {
        return $this->location;
    }

    /**
     * @param Address $location
     * @throws \LogicException
     * @return Event
     */
    public function setLocation(Address $location): Event
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Agenda
     */
    public function getAgenda(): Agenda
    {
        return $this->agenda;
    }

    /**
     * @param Agenda $agenda
     * @return Event
     */
    public function setAgenda(Agenda $agenda): Event
    {
        $this->agenda = $agenda;

        return $this;
    }
}