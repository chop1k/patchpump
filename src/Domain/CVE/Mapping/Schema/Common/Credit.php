<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common;

use App\Domain\CVE\Schema;
use InvalidArgumentException;

/**
 * @internal
 */
final readonly class Credit
{
    public function __construct(
        private Schema\Credit $schema,
    ) {
    }

    public function toPersistence(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        $type = strtolower($this->schema->type ?? '');

        return match ($type) {
            'other' => $this->other(),
            'finder' => $this->finder(),
            'reporter' => $this->reporter(),
            'analyst' => $this->analyst(),
            'coordinator' => $this->coordinator(),
            'remediation developer' => $this->remediationDeveloper(),
            'remediation reviewer' => $this->remediationReviewer(),
            'remediation verifier' => $this->remediationVerifier(),
            'tool' => $this->tool(),
            'sponsor' => $this->sponsor(),
            default => $this->null(),
        };
    }

    public function other(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withOther(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function finder(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withFinder(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function reporter(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withReporter(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function analyst(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withAnalyst(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function coordinator(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withCoordinator(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function remediationDeveloper(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withRemediationDeveloper(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function remediationReviewer(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withRemediationReviewer(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function remediationVerifier(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withRemediationVerifier(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function tool(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withTool(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function sponsor(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withSponsor(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function null(): \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit
    {
        return \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::withNull(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    private function language(): string
    {
        return $this->schema->lang ?? throw new InvalidArgumentException();
    }

    private function value(): string
    {
        return $this->schema->value ?? throw new InvalidArgumentException();
    }
}
