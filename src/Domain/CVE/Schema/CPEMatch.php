<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CPE match according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see CPENode
 */
final class CPEMatch
{
    #[Assert\NotNull]
    public ?bool $vulnerable = null;

    #[Assert\NotNull]
    #[Assert\Length(min: 1, max: 2048)]
    #[Assert\Regex('(cpe:2\\.3:[aho*\\-](:(((\\?*|\\*?)([a-zA-Z0-9\\-._]|(\\\\[\\\\*?!\"#$%&\'()+,/:;<=>@\\[\\]\\^`{|}~]))+(\\?*|\\*?))|[*\\-])){5}(:(([a-zA-Z]{2,3}(-([a-zA-Z]{2}|[0-9]{3}))?)|[*\\-]))(:(((\\?*|\\*?)([a-zA-Z0-9\\-._]|(\\\\[\\\\*?!\"#$%&\'()+,/:;<=>@\\[\\]\\^`{|}~]))+(\\?*|\\*?))|[*\\-])){4})')]
    public ?string $criteria = null;

    #[Assert\Uuid]
    public ?string $matchCriteriaId = null;

    #[Assert\Length(min: 1, max: 1024)]
    public ?string $versionStartExcluding = null;

    #[Assert\Length(min: 1, max: 1024)]
    public ?string $versionStartIncluding = null;

    #[Assert\Length(min: 1, max: 1024)]
    public ?string $versionEndExcluding = null;

    #[Assert\Length(min: 1, max: 1024)]
    public ?string $versionEndIncluding = null;
}
