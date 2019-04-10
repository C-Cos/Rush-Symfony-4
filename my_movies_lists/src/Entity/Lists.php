<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ListsRepository")
 */
class Lists
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $movie_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $list_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $list_description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $edit_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $privacy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getMovieId(): ?int
    {
        return $this->movie_id;
    }

    public function setMovieId(int $movie_id): self
    {
        $this->movie_id = $movie_id;

        return $this;
    }

    public function getListName(): ?string
    {
        return $this->list_name;
    }

    public function setListName(string $list_name): self
    {
        $this->list_name = $list_name;

        return $this;
    }

    public function getListDescription(): ?string
    {
        return $this->list_description;
    }

    public function setListDescription(?string $list_description): self
    {
        $this->list_description = $list_description;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(\DateTimeInterface $created_date): self
    {
        $this->created_date = $created_date;

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

    public function getPrivacy(): ?bool
    {
        return $this->privacy;
    }

    public function setPrivacy(bool $privacy): self
    {
        $this->privacy = $privacy;

        return $this;
    }
}
