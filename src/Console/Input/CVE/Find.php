<?php

declare(strict_types=1);

namespace App\Console\Input\CVE;

use Symfony\Component\Console\Input\InputInterface;

/**
 * php bin/console pp:cve:find
 *     --id=CVE-2023-0123
 *     --title=Some\ title one
 *     --title=Some\ title two
 *     --published
 *     --published=>12345678
 *     --published=<12345678
 *     --published=12345678
 *     --published=2024-08-07T04:24:17.541Z
 *     --updated=...
 *     --reserved=...
 *     --rejected=...
 *     --assigner=mitre
 *     --assigner=af854a3a-2127-422b-91ae-364da2661108
 *     --description=some keywords to search
 *     --configuration=some keywords to search
 *     --workaround=some keywords to search
 *     --exploit=some keywords to search
 *     --solution=some keywords to search
 *     --affected=some keywords to search
 *     --problem=some keywords to search
 *     --cpe=some keywords to search
 *     --metrics=some keywords to search.
 */
final readonly class Find
{
    public function __construct(
        private InputInterface $input,
    ) {
    }

    /**
     * @return string[]
     */
    private function criteria(string $name): array
    {
        $content = $this->input->getOption($name);

        if (false === is_array($content)) {
            throw new \InvalidArgumentException($name);
        }

        return array_filter($content, 'is_string');
    }

    /**
     * @return string[]
     */
    public function id(): array
    {
        return $this->criteria('id');
    }

    /**
     * @return string[]
     */
    public function title(): array
    {
        return $this->criteria('title');
    }

    /**
     * @return string[]
     */
    public function published(): array
    {
        return $this->criteria('published');
    }

    /**
     * @return string[]
     */
    public function updated(): array
    {
        return $this->criteria('updated');
    }

    /**
     * @return string[]
     */
    public function reserved(): array
    {
        return $this->criteria('reserved');
    }

    /**
     * @return string[]
     */
    public function rejected(): array
    {
        return $this->criteria('reserved');
    }

    /**
     * @return string[]
     */
    public function assigner(): array
    {
        return $this->criteria('assigner');
    }

    /**
     * @return string[]
     */
    public function description(): array
    {
        return $this->criteria('description');
    }

    /**
     * @return string[]
     */
    public function configuration(): array
    {
        return $this->criteria('configuration');
    }

    /**
     * @return string[]
     */
    public function workaround(): array
    {
        return $this->criteria('workaround');
    }

    /**
     * @return string[]
     */
    public function exploit(): array
    {
        return $this->criteria('exploit');
    }

    /**
     * @return string[]
     */
    public function solution(): array
    {
        return $this->criteria('solution');
    }

    /**
     * @return string[]
     */
    public function affected(): array
    {
        return $this->criteria('affected');
    }

    /**
     * @return string[]
     */
    public function problem(): array
    {
        return $this->criteria('problem');
    }

    /**
     * @return string[]
     */
    public function providedBy(): array
    {
        return $this->criteria('provided-by');
    }

    /**
     * @return string[]
     */
    public function cpe(): array
    {
        return $this->criteria('cpe');
    }

    /**
     * @return string[]
     */
    public function metric(): array
    {
        return $this->criteria('metric');
    }
}
