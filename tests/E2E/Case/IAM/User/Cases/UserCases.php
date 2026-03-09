<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\IAM\User\Cases;

use App\Tests\E2E\Case\IAM\Role\Cases\RoleCases;

/**
 * @interal
 *
 * @psalm-internal App\Tests\E2E\Case;
 */
final readonly class UserCases
{
    public const array PLAIN_USER = [
        '@context' => '/api/contexts/User',
        '@id' => '/api/users',
        '@type' => 'hydra:Collection',
        'name' => 'plain_user',
        'email' => 'test@example.com',
        'roles' => [
            RoleCases::PLAIN_ROLE,
        ],
    ];

    public const array USER_WITH_CONTACTS = [
        '@context' => '/api/contexts/User',
        '@id' => '/api/users',
        '@type' => 'hydra:Collection',
        'name' => 'user_with_contacts',
        'email' => 'test@example.com',
        'roles' => [
            RoleCases::PLAIN_ROLE,
        ],
        'contacts' => [
            ContactCases::TELEGRAM,
        ],
    ];

    public const array USER_WITH_CONTACTS_WITH_DESCRIPTION = [
        '@context' => '/api/contexts/User',
        '@id' => '/api/users',
        '@type' => 'hydra:Collection',
        'name' => 'user_with_contacts_with_description',
        'email' => 'test@example.com',
        'roles' => [
            RoleCases::PLAIN_ROLE,
        ],
        'contacts' => [
            ContactCases::TELEGRAM_WITH_DESCRIPTION,
        ],
    ];

    public const array USER_WITH_ALL_CONTACTS = [
        '@context' => '/api/contexts/User',
        '@id' => '/api/users',
        '@type' => 'hydra:Collection',
        'name' => 'user_with_all_contacts',
        'email' => 'test@example.com',
        'roles' => [
            RoleCases::PLAIN_ROLE,
        ],
        'contacts' => [
            ContactCases::TELEGRAM_WITH_DESCRIPTION,
            ContactCases::DISCORD_WITH_DESCRIPTION,
            ContactCases::SLACK_WITH_DESCRIPTION,
            ContactCases::EMAIL_WITH_DESCRIPTION,
        ],
    ];

    public const array GET_COLLECTION = [
    ];

    public const array ONE = [
        ['plain_user', self::PLAIN_USER],
        ['user_with_contacts', self::USER_WITH_CONTACTS],
        ['user_with_contacts_with_description', self::USER_WITH_CONTACTS_WITH_DESCRIPTION],
        ['user_with_all_contacts', self::USER_WITH_ALL_CONTACTS],
    ];
}
