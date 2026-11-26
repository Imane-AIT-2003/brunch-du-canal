<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateHeure = null;

    #[ORM\Column]
    private ?int $nbPlace = null;

    #[ORM\Column]
    private ?bool $tablePrete = null;

    #[ORM\Column(nullable: true)]
    private ?bool $resaConfirmee = null;

    #[ORM\ManyToOne(inversedBy: 'reservation')]
    private ?Client $client = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Table $tableResa = null;

    #[ORM\ManyToOne(inversedBy: 'reservation')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTime
    {
        return $this->dateHeure;
    }

    public function setDateHeure(\DateTime $dateHeure): static
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->nbPlace;
    }

    public function setNbPlace(int $nbPlace): static
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    public function isTablePrete(): ?bool
    {
        return $this->tablePrete;
    }

    public function setTablePrete(bool $tablePrete): static
    {
        $this->tablePrete = $tablePrete;

        return $this;
    }

    public function isResaConfirmee(): ?bool
    {
        return $this->resaConfirmee;
    }

    public function setResaConfirmee(?bool $resaConfirmee): static
    {
        $this->resaConfirmee = $resaConfirmee;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getTableResa(): ?Table
    {
        return $this->tableResa;
    }

    public function setTableResa(?Table $tableResa): static
    {
        $this->tableResa = $tableResa;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
