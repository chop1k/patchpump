<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Source
{
    public function __construct(
        #[ODM\Field]
        private ?string $repository = null,

        /**
         * @var string[]|null $modules
         */
        #[ODM\Field(type: 'collection')]
        private ?array $modules = null,

        /**
         * @var string[]|null $files
         */
        #[ODM\Field(type: 'collection')]
        private ?array $files = null,

        /**
         * @var string[]|null $routines
         */
        #[ODM\Field(type: 'collection')]
        private ?array $routines = null,
    ) {
    }

    public function repository(): ?string
    {
        return $this->repository;
    }

    /**
     * @return string[]|null
     */
    public function modules(): ?array
    {
        return $this->modules;
    }

    /**
     * @return string[]|null
     */
    public function files(): ?array
    {
        return $this->files;
    }

    /**
     * @return string[]|null
     */
    public function routines(): ?array
    {
        return $this->routines;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->repository ??= null;
        $this->modules ??= null;
        $this->files ??= null;
        $this->routines ??= null;
    }
}
