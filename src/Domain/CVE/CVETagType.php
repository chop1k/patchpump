<?php

declare(strict_types=1);

namespace App\Domain\CVE;

enum CVETagType
{
    case BrokenLink;
    case CustomerEntitlement;
    case Exploit;
    case GovernmentResource;
    case IssueTracking;
    case MailingList;
    case Mitigation;
    case NotApplicable;
    case Patch;
    case PermissionRequired;
    case MediaCoverage;
    case Product;
    case Related;
    case ReleaseNotes;
    case Signature;
    case TechnicalDescription;
    case ThirdPartyAdvisory;
    case VendorAdvisory;
    case VdbEntry;
}