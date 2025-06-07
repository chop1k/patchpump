<?php

declare(strict_types=1);

namespace App\API\Resource\CVE;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\API\Resource\CVE\DTO\Metric;
use App\API\Resource\CVE\DTO\Solution;
use App\API\Resource\CVE\DTO\Workaround;

#[ApiResource(
    shortName: 'cve',
    operations: [
        new GetCollection(),
        new Post(),
        new Get(),
        new Patch(),
        new Delete(),
    ],
    routePrefix: '/vulnerabilities',
)]
final class CVE
{
    private ?string $status = null;

    /**
     * @var string[]
     */
    private array $platforms = [];

    /**
     * @var string[]
     */
    private array $modules = [];

    /**
     * @var string[]
     */
    private array $files = [];

    /**
     * @var string[]
     */
    private array $routines = [];

    /**
     * @var Workaround[]
     */
    private array $workarounds = [];

    /**
     * @var Solution[]
     */
    private array $solutions = [];

    /**
     * @var Metric[]
     */
    private array $metrics = [];

    /**
     * @var CWE[]
     */
    private array $weaknesses = [];

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
