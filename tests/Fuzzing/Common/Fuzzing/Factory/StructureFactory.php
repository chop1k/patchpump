<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Fuzzing\Factory;

use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ConfigurationInterface;
use App\Tests\Fuzzing\Common\Fuzzing\Contracts\ObjectFactoryInterface;
use Override;

/**
 * @template T
 *
 * @implements ObjectFactoryInterface<T>
 */
final readonly class StructureFactory implements ObjectFactoryInterface
{
    public function __construct(
        /**
         * @var Closure(): T $factory
         */
        private \Closure $factory,
        private ConfigurationInterface $configuration,
    ) {
    }

    /**
     * @param array<non-negative-int, mixed> $arguments
     *
     * @return T
     */
    #[Override]
    public function objectFor(mixed ...$arguments): mixed
    {
        $fields = $this->configuration->fields();

        $numberOfFields = count($fields);

        $object = call_user_func($this->factory);

        for ($i = 0; $i < $numberOfFields; ++$i) {
            $field = $fields[$i];

            $object->$field = $arguments[$i];
        }

        return $object;
    }
}
