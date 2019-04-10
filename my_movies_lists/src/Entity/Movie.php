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
     * @ORM\OneToMany(targetEntity="App\Entity\lists", mappedBy="movie")
     */
    private $title;

    public function __construct()
    {
        $this->title = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|lists[]
     */
    public function getTitle(): Collection
    {
        return $this->title;
    }

    public function addTitle(lists $title): self
    {
        if (!$this->title->contains($title)) {
            $this->title[] = $title;
            $title->setMovie($this);
        }

        return $this;
    }

    public function removeTitle(lists $title): self
    {
        if ($this->title->contains($title)) {
            $this->title->removeElement($title);
            // set the owning side to null (unless already changed)
            if ($title->getMovie() === $this) {
                $title->setMovie(null);
            }
        }

        return $this;
    }
}
