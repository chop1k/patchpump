<?php

declare(strict_types=1);

namespace App\Tests\E2E\Case\IAM\User\Cases;

/**
 * @interal
 *
 * @psalm-internal App\Tests\E2E\Case\User\Cases
 */
final readonly class ContactCases
{
    public const array TELEGRAM = [
        '@context' => '/api/contexts/Contact',
        '@id' => '/api/contacts/1',
        '@type' => 'hydra:Collection',
        'type' => 'telegram',
        'value' => 'username',
    ];

    public const array TELEGRAM_WITH_DESCRIPTION = [
        '@context' => '/api/contexts/Contact',
        '@id' => '/api/contacts/1',
        '@type' => 'hydra:Collection',
        'type' => 'telegram',
        'value' => 'username',
        'description' => 'some description',
    ];

    public const array DISCORD_WITH_DESCRIPTION = [
        '@context' => '/api/contexts/Contact',
        '@id' => '/api/contacts/2',
        '@type' => 'hydra:Collection',
        'type' => 'discord',
        'value' => 'username',
        'description' => 'some description',
    ];

    public const array SLACK_WITH_DESCRIPTION = [
        '@context' => '/api/contexts/Contact',
        '@id' => '/api/contacts/3',
        '@type' => 'hydra:Collection',
        'type' => 'slack',
        'value' => 'username',
        'description' => 'some description',
    ];

    public const array EMAIL_WITH_DESCRIPTION = [
        '@context' => '/api/contexts/Contact',
        '@id' => '/api/contacts/4',
        '@type' => 'hydra:Collection',
        'type' => 'email',
        'value' => 'username',
        'description' => 'some description',
    ];
}
