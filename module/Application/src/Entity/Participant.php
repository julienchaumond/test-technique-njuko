<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Participant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $firstname;

    /** @ORM\Column(type="string") */
    protected $lastname;

    /** @ORM\Column(type="string") */
    protected $sex;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", onDelete="CASCADE")
     *
     * @var \Application\Entity\Event
     */
    protected $event;

    /** @ORM\Column(type="string", nullable=true) */
    protected $dossard_number;

    /** @ORM\Column(type="string", options={"default":"00:00:00"}) */
    protected $measured_time;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return mixed
     */
    public function getDossardNumber()
    {
        return $this->dossard_number;
    }

    /**
     * @param mixed $dossard_number
     */
    public function setDossardNumber($dossard_number)
    {
        $this->dossard_number = $dossard_number;
    }

    /**
     * @return mixed
     */
    public function getMeasuredTime()
    {
        return $this->measured_time;
    }

    /**
     * @param mixed $measured_time
     */
    public function setMeasuredTime($measured_time)
    {
        $this->measured_time = $measured_time;
    }
}