<?php

declare(strict_types=1);

namespace App\Persistence\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class Version
{
    #[ORM\Column(length: 255)]
    private ?string $value = null;

    #[ORM\Column(length: 32)]
    private ?string $type = null;

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
