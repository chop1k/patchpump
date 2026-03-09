<?php

declare(strict_types=1);

namespace App\Presentation\API\Resource\User;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;

/**
 * @psalm-api
 */
#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/contacts.{_format}',
        ),
        new Post(
            uriTemplate: '/contacts.{_format}',
        ),
        new Get(
            uriTemplate: '/contacts/{contact_id}.{_format}',
            uriVariables: [
                'contact_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Contact::class,
                ),
            ]
        ),
        new Patch(
            uriTemplate: '/contacts/{contact_id}.{_format}',
            uriVariables: [
                'contact_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Contact::class,
                ),
            ]
        ),
        new Delete(
            uriTemplate: '/contacts/{contact_id}.{_format}',
            uriVariables: [
                'contact_id' => new Link(
                    fromProperty: 'id',
                    fromClass: Contact::class,
                ),
            ]
        ),
    ]
)]
final readonly class Contact
{
    public function __construct(
        public int $id,
        /**
         * @var non-empty-string $type
         */
        public string $type,
        /**
         * @var non-empty-string $value
         */
        public string $value,
        /**
         * @var non-empty-string|null $description
         */
        public ?string $description = null,
    ) {
    }
}
