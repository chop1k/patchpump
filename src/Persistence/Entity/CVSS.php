<?php

declare(strict_types=1);

namespace App\Persistence\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class CVSS
{
    #[ORM\Column(length: 32)]
    private ?string $attack_vector = null;

    #[ORM\Column(length: 32)]
    private ?string $attack_complexity = null;

    #[ORM\Column(length: 32)]
    private ?string $privileges_required = null;

    #[ORM\Column(length: 32)]
    private ?string $user_interaction = null;

    #[ORM\Column(length: 32)]
    private ?string $scope = null;

    #[ORM\Column(length: 32)]
    private ?string $confidentiality_impact = null;

    #[ORM\Column(length: 32)]
    private ?string $integrity_impact = null;

    #[ORM\Column(length: 32)]
    private ?string $availability_impact = null;

    public function getAttackVector(): ?string
    {
        return $this->attack_vector;
    }

    public function setAttackVector(string $attack_vector): self
    {
        $this->attack_vector = $attack_vector;

        return $this;
    }

    public function getAttackComplexity(): ?string
    {
        return $this->attack_complexity;
    }

    public function setAttackComplexity(string $attack_complexity): self
    {
        $this->attack_complexity = $attack_complexity;

        return $this;
    }

    public function getPrivilegesRequired(): ?string
    {
        return $this->privileges_required;
    }

    public function setPrivilegesRequired(string $privileges_required): self
    {
        $this->privileges_required = $privileges_required;

        return $this;
    }

    public function getUserInteraction(): ?string
    {
        return $this->user_interaction;
    }

    public function setUserInteraction(string $user_interaction): self
    {
        $this->user_interaction = $user_interaction;

        return $this;
    }

    public function getScope(): ?string
    {
        return $this->scope;
    }

    public function setScope(string $scope): self
    {
        $this->scope = $scope;

        return $this;
    }

    public function getConfidentialityImpact(): ?string
    {
        return $this->confidentiality_impact;
    }

    public function setConfidentialityImpact(string $confidentiality_impact): self
    {
        $this->confidentiality_impact = $confidentiality_impact;

        return $this;
    }

    public function getIntegrityImpact(): ?string
    {
        return $this->integrity_impact;
    }

    public function setIntegrityImpact(string $integrity_impact): self
    {
        $this->integrity_impact = $integrity_impact;

        return $this;
    }

    public function getAvailabilityImpact(): ?string
    {
        return $this->availability_impact;
    }

    public function setAvailabilityImpact(string $availability_impact): self
    {
        $this->availability_impact = $availability_impact;

        return $this;
    }
}
