<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Testing;

use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ConfigurationInterface;
use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ShuffleAlgorithmInterface;
use App\Tests\Fuzzing\Common\Fuzzing\Factory\StructureFactory;
use App\Tests\Fuzzing\Common\Fuzzing\Fuzzing;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\CartesianShuffle;
use App\Tests\Fuzzing\Common\Fuzzing\Shuffle\OFATShuffle;

/**
 * @template T
 */
final readonly class ProviderFactory
{
    public function __construct(
        /**
         * @var Closure(): T $factory
         */
        private mixed $factory,
        private ConfigurationInterface $configuration,
    ) {
    }

    /**
     * @return FuzzingToProviderAdapter<T>
     */
    private function fuzzingAdapterFor(ShuffleAlgorithmInterface $shuffleAlgorithm): FuzzingToProviderAdapter
    {
        $objectFactory = new StructureFactory($this->factory, $this->configuration);

        return new FuzzingToProviderAdapter(
            new Fuzzing($shuffleAlgorithm, $objectFactory),
        );
    }

    /**
     * @return iterable<T>
     */
    public function cartesianProvider(): iterable
    {
        return $this->fuzzingAdapterFor(
            new CartesianShuffle(
                $this->configuration
            ),
        );
    }

    /**
     * @return iterable<T>
     */
    public function ofatProvider(): iterable
    {
        return $this->fuzzingAdapterFor(
            new OFATShuffle(
                $this->configuration,
            ),
        );
    }
}
