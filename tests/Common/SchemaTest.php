<?php

declare(strict_types=1);

namespace App\Tests\Common;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class SchemaTest extends KernelTestCase
{
    protected ?ValidatorInterface $validator = null;

    protected function setUp(): void
    {
        parent::setUp();

        self::bootKernel();

        $this->validator = self::getContainer()
            ->get(ValidatorInterface::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

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
