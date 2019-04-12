<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title_name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $create_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $edit_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Listname;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $privacy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="author")
     */
    private $users;

    public function __construct()
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleName(): ?string
    {
        return $this->title_name;
    }

    public function setTitleName(string $title_name): self
    {
        $this->title_name = $title_name;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(?\DateTimeInterface $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getEditDate(): ?\DateTimeInterface
    {
        return $this->edit_date;
    }

    public function setEditDate(?\DateTimeInterface $edit_date): self
    {
        $this->edit_date = $edit_date;

        return $this;
    }

    public function getListname(): ?string
    {
        return $this->Listname;
    }

    public function setListname(?string $Listname): self
    {
        $this->Listname = $Listname;

        return $this;
    }

    public function getPrivacy(): ?bool
    {
        return $this->privacy;
    }

    public function setPrivacy(?bool $privacy): self
    {
        $this->privacy = $privacy;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }
}
