<?php

namespace App\Entity;

use App\Repository\PeoplesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

class Peoples
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?Films $films = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilms(): ?Films
    {
        return $this->films;
    }

    public function setFilms(?Films $films): self
    {
        $this->films = $films;

        return $this;
    }

}