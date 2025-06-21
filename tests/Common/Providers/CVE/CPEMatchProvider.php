<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\CPEMatch;

final class CPEMatchProvider
{
    public static function provideValid(): array
    {
        $match_0 = new CPEMatch();

        $match_0->vulnerable = true;
        $match_0->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';

        $match_1 = new CPEMatch();

        $match_1->vulnerable = true;
        $match_1->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_1->matchCriteriaId = '37de6b35-f5e7-4112-9194-e73af5100db4';

        $match_2 = new CPEMatch();

        $match_2->vulnerable = true;
        $match_2->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_2->versionStartIncluding = '123';

        $match_3 = new CPEMatch();

        $match_3->vulnerable = true;
        $match_3->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_3->versionStartExcluding = '123';

        $match_4 = new CPEMatch();

        $match_4->vulnerable = true;
        $match_4->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_4->versionEndIncluding = '123';

        $match_5 = new CPEMatch();

        $match_5->vulnerable = true;
        $match_5->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_5->versionEndExcluding = '123';

        return [
            $match_0,
            $match_1,
            $match_2,
            $match_3,
            $match_4,
            $match_5,
        ];
    }

    public static function provideInvalid(): array
    {
        $match_0 = new CPEMatch();

        $match_0->vulnerable = true;
        $match_0->criteria = null;

        $match_1 = new CPEMatch();

        $match_1->vulnerable = null;
        $match_1->criteria = null;

        $match_2 = new CPEMatch();

        $match_2->vulnerable = true;
        $match_2->criteria = '';

        $match_3 = new CPEMatch();

        $match_3->vulnerable = true;
        $match_3->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_3->matchCriteriaId = '123';

        $match_4 = new CPEMatch();

        $match_4->vulnerable = true;
        $match_4->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_4->versionStartIncluding = '';

        $match_5 = new CPEMatch();

        $match_5->vulnerable = true;
        $match_5->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_5->versionStartExcluding = '';

        $match_6 = new CPEMatch();

        $match_6->vulnerable = true;
        $match_6->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_6->versionEndIncluding = '';

        $match_7 = new CPEMatch();

        $match_7->vulnerable = true;
        $match_7->criteria = 'cpe:2.3:o:microsoft:windows_7:-:sp2:*:*:*:*:*:*';
        $match_7->versionEndExcluding = '';

        return [
            $match_0,
            $match_1,
            $match_2,
            $match_3,
            $match_4,
            $match_5,
            $match_6,
            $match_7,
        ];
    }
}