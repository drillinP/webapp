<?php

namespace App\Entity;

use App\Repository\MapsRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use PHPStan\Type\Doctrine\Descriptors\DateTimeTzType;

#[ORM\Entity(repositoryClass: MapsRepository::class)]
#[ORM\Table(name: '`webapp.maps`')]
class Maps
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'text')]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private string|null $title;

    #[ORM\Column(type: 'text', nullable: true)]
    private string|null $description;

    #[ORM\Column(type: 'date', options:["default"=>"NOW()"])]
    private DateTimeImmutable $created_at;

    #[ORM\Column(type: 'date', nullable: true)]
    private DateTimeImmutable|null $updated_at;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'maps')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $created_by;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->created_by;
    }

    public function setCreatedBy(?User $created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }
}
