<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class Problem
{
    public function __construct(
        private Schema\ProblemType $schema,
    ) {
    }

    /**
     * @return Persistence\ProblemType
     */
    public function toPersistence(): Persistence\ProblemType
    {
        $problems = new ChaoticCollection(
            $this->schema->descriptions,
            $this->mapProblem(...),
        );

        return $problems
            ->ensureInstanceOf(Schema\ProblemType::class)
            ->map()
            ->toArray();
    }

    private function mapProblem(Schema\ProblemDescription $problem): Persistence\ProblemDescription
    {
        $persistence = new Persistence\ProblemDescription();

        $persistence->setLanguage($problem->lang);
        $persistence->setContent($problem->description);
        $persistence->setType($problem->type);
        $persistence->setCwe($problem->cweId);

        if (null !== $problem->references) {
            $references = new ChaoticCollection(
                $problem->references,
                $this->mapReference(...),
            );

            $references = $references
                ->ensureInstanceOf(Schema\Reference::class)
                ->map()
                ->toArrayCollection();

            $persistence->setReferences($references);
        }

        return $persistence;
    }

    private function mapReference(Schema\Reference $reference): Persistence\Reference
    {
        $mapping = new Reference($reference);

        return $mapping->toPersistence();
    }
}
