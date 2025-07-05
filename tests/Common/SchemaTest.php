<?php

declare(strict_types=1);

namespace App\Tests\Common;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder;

abstract class SchemaTest extends TestCase
{
    protected ?ValidatorInterface $validator = null;

    protected function setUp(): void
    {
        $builder = new ValidatorBuilder();

        $builder->enableAttributeMapping();

        $this->validator = $builder->getValidator();
    }

    protected function tearDown(): void
    {
        $this->validator = null;
    }

    public function testValidRules(object $value): void
    {
        $errors = $this->validator->validate($value);

        self::assertCount(0, $errors, $errors->__toString());
    }

    public function testInvalidRules(object $value): void
    {
        $errors = $this->validator->validate($value);

        self::assertNotCount(0, $errors, $errors->__toString());
    }

    protected static function mapRules(array $rules): iterable
    {
        return array_map(
            static fn (object $routine) => [$routine],
            $rules,
        );
    }
}