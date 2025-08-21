<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Common\Description;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Container
{
    private function __construct(
        #[ODM\Field]
        private int $type,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'description' => Description::class,
            ]
        )]
        private Description $description,
    ) {
    }

    public static function forPlain(Description $description): self
    {
        return new self(0, $description);
    }

    public static function forConfiguration(Description $description): self
    {
        return new self(1, $description);
    }

    public static function forWorkaround(Description $description): self
    {
        return new self(2, $description);
    }

    public static function forSolution(Description $description): self
    {
        return new self(3, $description);
    }

    public static function forExploit(Description $description): self
    {
        return new self(4, $description);
    }

    public static function forImpact(Description $description): self
    {
        return new self(5, $description);
    }

    public function containsPlain(): bool
    {
        return 0 === $this->type;
    }

    public function containsConfiguration(): bool
    {
        return 1 === $this->type;
    }

    public function containsWorkaround(): bool
    {
        return 2 === $this->type;
    }

    public function containsSolution(): bool
    {
        return 3 === $this->type;
    }

    public function containsExploit(): bool
    {
        return 4 === $this->type;
    }

    public function containsImpact(): bool
    {
        return 5 === $this->type;
    }

    public function description(): Description
    {
        return $this->description;
    }
}
