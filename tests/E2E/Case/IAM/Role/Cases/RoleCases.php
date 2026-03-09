<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\IAM\Role\Cases;

/**
 * @interal
 *
 * @psalm-internal App\Tests\E2E\Case;
 */
final readonly class RoleCases
{
    public const array PLAIN_ROLE = [
        '@context' => '/api/contexts/UserRole',
        '@id' => '/api/users',
        '@type' => 'hydra:Collection',
        'name' => 'ROLE_USER',
        'description' => 'some description',
        'permissions' => [
            'USER_UPDATE_SELF',
            'USER_REMOVE_SELF',
        ],
    ];
}
