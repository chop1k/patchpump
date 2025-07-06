<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(
    name: 'pp:cve:remove',
    description: 'Remove cve record from the system.',
)]
final class RemoveCommand extends Command
{

}