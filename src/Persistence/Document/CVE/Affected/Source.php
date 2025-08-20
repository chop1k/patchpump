<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Source
{
    public function __construct(
        #[ODM\Field]
        private ?string $repository,

        /**
         * @var string[]|null $modules
         */
        #[ODM\Field(type: 'collection')]
        private ?array $modules,

        /**
         * @var string[]|null $files
         */
        #[ODM\Field(type: 'collection')]
        private ?array $files,

        /**
         * @var string[]|null $routines
         */
        #[ODM\Field(type: 'collection')]
        private ?array $routines,
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
}
