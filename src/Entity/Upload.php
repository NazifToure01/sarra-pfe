<?php

namespace App\Entity;

use App\Repository\UploadRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UploadRepository::class)]
class Upload
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $passeport = null;

    #[ORM\Column(length: 255)]
    private ?string $PasseVaccinale = null;

    #[ORM\Column(length: 255)]
    private ?string $CarteSejour = null;

    #[ORM\Column(length: 255)]
    private ?string $Photo = null;

    #[ORM\Column(length: 255)]
    private ?string $CarnetVaccinale = null;

    #[ORM\ManyToOne]
    private ?User $user = null;

    public function getId(): ?int 

    {
        return $this->id;
    }

    public function getPasseport(): ?string
    {
        return $this->passeport;
    }

    public function setPasseport(string $passeport): self
    {
        $this->passeport = $passeport;

        return $this;
    }

    public function getPasseVaccinale(): ?string
    {
        return $this->PasseVaccinale;
    }

    public function setPasseVaccinale(string $PasseVaccinale): self
    {
        $this->PasseVaccinale = $PasseVaccinale;

        return $this;
    }

    public function getCarteSejour(): ?string
    {
        return $this->CarteSejour;
    }

    public function setCarteSejour(string $CarteSejour): self
    {
        $this->CarteSejour = $CarteSejour;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getCarnetVaccinale(): ?string
    {
        return $this->CarnetVaccinale;
    }

    public function setCarnetVaccinale(string $CarnetVaccinale): self
    {
        $this->CarnetVaccinale = $CarnetVaccinale;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
