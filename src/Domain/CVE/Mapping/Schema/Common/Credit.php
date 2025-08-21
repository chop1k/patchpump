<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class Credit
{
    public function __construct(
        private Schema\Credit $schema,
    ) {
    }

    public function toPersistence(): Persistence\Common\Credit
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

    public function other(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withOther(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function finder(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withFinder(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function reporter(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withReporter(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function analyst(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withAnalyst(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function coordinator(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withCoordinator(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function remediationDeveloper(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withRemediationDeveloper(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function remediationReviewer(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withRemediationReviewer(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function remediationVerifier(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withRemediationVerifier(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function tool(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withTool(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function sponsor(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withSponsor(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    public function null(): Persistence\Common\Credit
    {
        return Persistence\Common\Credit::withNull(
            $this->language(),
            $this->value(),
            $this->schema->user,
        );
    }

    private function language(): string
    {
        return $this->schema->lang ?? throw new \InvalidArgumentException();
    }

    private function value(): string
    {
        return $this->schema->value ?? throw new \InvalidArgumentException();
    }
}
