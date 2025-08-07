<?php

declare(strict_types=1);

namespace App\Persistence\Enum\CVE;

enum CreditType: int
{
    case Other = 0;

    case Finder = 1;

    case Reporter = 2;

    case Analyst = 3;

    case Coordinator = 4;

    case RemediationDeveloper = 5;

    case RemediationReviewer = 6;

    case RemediationVerifier = 7;

    case Tool = 8;

    case Sponsor = 9;
}
