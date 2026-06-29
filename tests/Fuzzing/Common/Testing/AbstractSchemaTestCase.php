<?php

declare(strict_types=1);

namespace App\Tests\Fuzzing\Common\Testing;

use LogicException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractSchemaTestCase extends KernelTestCase
{
    protected function validator(): ValidatorInterface
    {
        $validator = self::getContainer()
            ->get(ValidatorInterface::class);

        if ($validator instanceof ValidatorInterface) {
            return $validator;
        }

        // shut up psalm
        // todo: message
        throw new LogicException();
    }

    protected function assertValidationPassed(ConstraintViolationListInterface $errors): void
    {
        $this->assertCount(0, $errors, $errors->__toString());
    }

    protected function assertValidationFailed(ConstraintViolationListInterface $errors): void
    {
        $this->assertCount(1, $errors, $errors->__toString());
    }
}
