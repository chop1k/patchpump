<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Common;

use App\Domain\CVE\Schema\Record;
use Symfony\Component\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @internal
 */
final readonly class SerializedRecord
{
    public function __construct(
        private ValidatorInterface $validator,
        private Record $record,
    ) {
    }

    public function validate(): ValidatedRecord
    {
        $errors = $this->validator->validate($this->record);

        if (count($errors) > 0) {
            throw new ValidatorException($errors->__toString());
        }

        return new ValidatedRecord($this->record);
    }
}