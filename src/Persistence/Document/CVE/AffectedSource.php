<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class AffectedSource
{
    #[ODM\Field]
    private ?string $repository = null;

    /**
     * @var string[]|null
     */
    #[ODM\Field(type: 'collection')]
    private ?array $modules = null;

    /**
     * @var string[]|null
     */
    #[ODM\Field(type: 'collection')]
    private ?array $files = null;

    /**
     * @var string[]|null
     */
    #[ODM\Field(type: 'collection')]
    private ?array $routines = null;

    public function getRepository(): ?string
    {
        return $this->repository;
    }

    public function setRepository(?string $repository): self
    {
        $this->repository = $repository;

        return $this;
    }

    public function getModules(): ?array
    {
        return $this->modules;
    }

    /**
     * @param string[]|null $modules
     */
    public function setModules(?array $modules): self
    {
        $this->modules = $modules;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    /**
     * @param string[]|null $files
     */
    public function setFiles(?array $files): self
    {
        $this->files = $files;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getRoutines(): ?array
    {
        return $this->routines;
    }

    /**
     * @param string[]|null $routines
     */
    public function setRoutines(?array $routines): self
    {
        $this->routines = $routines;

        return $this;
    }
}
