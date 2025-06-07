<?php

declare(strict_types=1);

namespace App\Domain\CVE\Converter;

use App\Domain\CVE\Record;

final class Mitre0501Converter implements ConverterInterface
{
    public function convert(array $data): Record
    {
        $type = $data['dataType'] ?? null;

        if (null === $type || false === is_string($type)) {
            throw new \InvalidArgumentException('Missing data type');
        }

        $version = $data['dataVersion'] ?? null;

        if (null === $version || false === is_string($version)) {
            throw new \InvalidArgumentException('Missing data version');
        }

        $metadata = $data['cveMetadata'] ?? null;

        if (null === $metadata || false === is_array($metadata) || true === array_is_list($metadata)) {
            throw new \InvalidArgumentException('Missing metadata');
        }

        $containers = $data['containers'] ?? null;

        if (null === $containers || false === is_array($containers) || true === array_is_list($containers)) {
            throw new \InvalidArgumentException('Missing containers');
        }

        $record = new Record();

        $this->processMetadata($metadata, $record);
        $this->processContainers($containers, $record);

        return $record;
    }

    private function processMetadata(array $metadata, Record $record): void
    {
        $id = $metadata['cveId'] ?? null;

        if (null === $id || false === is_string($id)) {
            throw new \InvalidArgumentException('Missing cve id');
        }

        // do something with id

        $assignerId = $metadata['assignerOrgId'] ?? null;

        if (null === $assignerId || false === is_string($assignerId)) {
            throw new \InvalidArgumentException('Missing cve assignerId');
        }

        // do something with assigner id

        $state = $metadata['state'] ?? null;

        if (null === $state || false === is_string($state)) {
            throw new \InvalidArgumentException('Missing cve state');
        }

        // do something with state

        /**
         * @var string|null $assignerShortName
         */
        $assignerShortName = $metadata['assignerShortName'] ?? null;

        if (true === is_string($assignerShortName)) {
            // do something with assigner short name
        }

        /**
         * @var string|null $userId
         */
        $userId = $metadata['requesterUserId'] ?? null;

        if (true === is_string($userId)) {
            // do something with user id
        }

        /**
         * @var int|null $serial
         */
        $serial = $metadata['serial'] ?? null;

        if (true === is_int($serial)) {
            // do something with serial
        }

        /**
         * @var string|null $updatedAt
         */
        $updatedAt = $metadata['dateUpdated'] ?? null;

        if (true === is_string($updatedAt)) {
            // do something with updated at
        }

        /**
         * @var string|null $reservedAt
         */
        $reservedAt = $metadata['dateReserved'] ?? null;

        if (true === is_string($reservedAt)) {
            // do something with reserved at
        }

        /**
         * @var string|null $publishedAt
         */
        $publishedAt = $metadata['datePublished'] ?? null;

        if (true === is_string($publishedAt)) {
            // do something with published at
        }
    }

    private function processContainers(array $containers, Record $record): void
    {
        $cna = $containers['cna'] ?? null;

        if (null === $cna || false === is_array($cna) || true === array_is_list($cna)) {
            throw new \InvalidArgumentException('Missing containers');
        }

        $this->processCNAPublished($cna, $record);

        $adp = $containers['adp'] ?? null;

        if (null === $adp || false === is_array($adp) || false === array_is_list($adp)) {
            return;
        }

        foreach ($adp as $container) {
            if (null === $container || false === is_array($container) || true === array_is_list($container)) {
                continue;
            }

            $this->processADP($container, $record);
        }
    }

    private function processCNAPublished(array $cna, Record $record): void
    {
        $metadata = $cna['providerMetadata'] ?? null;

        if (null === $metadata || false === is_array($metadata) || true === array_is_list($metadata)) {
            throw new \InvalidArgumentException('Missing metadata');
        }

        $this->processProviderMetadata($metadata, $record);

        $descriptions = $cna['descriptions'] ?? null;

        if (null === $descriptions || false === is_array($descriptions) || false === array_is_list($descriptions)) {
            throw new \InvalidArgumentException('Missing descriptions');
        }

        foreach ($descriptions as $description) {
            $this->processDescription($description, $record);
        }

        $affected = $cna['affected'] ?? null;

        if (null === $affected || false === is_array($affected) || false === array_is_list($affected)) {
            throw new \InvalidArgumentException('Missing affected');
        }

        foreach ($affected as $item) {
            $this->processAffected($item, $record);
        }

        $references = $cna['references'] ?? null;

        if (null === $references || false === is_array($references) || false === array_is_list($references)) {
            throw new \InvalidArgumentException('Missing references');
        }

        foreach ($references as $reference) {
            $this->processReference($reference, $record);
        }

        $title = $cna['title'] ?? null;

        if (true === is_string($title)) {
            // do something with title
        }

        $cpeApplicability = $cna['cpeApplicability'] ?? null;

        if (true === is_array($cpeApplicability) && true === array_is_list($cpeApplicability)) {
            foreach ($cpeApplicability as $item) {
                $this->processCPEApplicability($item, $record);
            }
        }

        $problems = $cna['problemTypes'] ?? null;

        if (true === is_array($problems) && true === array_is_list($problems)) {
            foreach ($problems as $problem) {
                $this->processProblem($problem, $record);
            }
        }

        $impacts = $cna['impacts'] ?? null;

        if (true === is_array($impacts) && true === array_is_list($impacts)) {
            foreach ($impacts as $impact) {
                $this->processImpact($impact, $record);
            }
        }

        $metrics = $cna['metrics'] ?? null;

        if (true === is_array($metrics) && true === array_is_list($metrics)) {
            foreach ($metrics as $metric) {
                $this->processMetric($metric, $record);
            }
        }

        $configurations = $cna['configurations'] ?? null;

        if (true === is_array($configurations) && true === array_is_list($configurations)) {
            foreach ($configurations as $configuration) {
                $this->processConfiguration($configuration, $record);
            }
        }

        $workarounds = $cna['workarounds'] ?? null;

        if (true === is_array($workarounds) && true === array_is_list($workarounds)) {
            foreach ($workarounds as $workaround) {
                $this->processWorkaround($workaround, $record);
            }
        }

        $solutions = $cna['solutions'] ?? null;

        if (true === is_array($solutions) && true === array_is_list($solutions)) {
            foreach ($solutions as $solution) {
                $this->processSolution($solution, $record);
            }
        }

        $exploits = $cna['exploits'] ?? null;

        if (true === is_array($exploits) && true === array_is_list($exploits)) {
            foreach ($exploits as $exploit) {
                $this->processExploit($exploit, $record);
            }
        }

        $timeline = $cna['timeline'] ?? null;

        if (true === is_array($timeline) && true === array_is_list($timeline)) {
            foreach ($timeline as $timelineItem) {
                $this->processTimeline($timelineItem, $record);
            }
        }

        $credits = $cna['credits'] ?? null;

        if (true === is_array($credits) && true === array_is_list($credits)) {
            foreach ($credits as $credit) {
                $this->processCredit($credit, $record);
            }
        }

        $source = $cna['source'] ?? null;

        if (true === is_array($source) && false === array_is_list($source)) {
            $this->processSource($source, $record);
        }

        $tags = $cna['tags'] ?? null;

        if (true === is_array($tags) && true === array_is_list($tags)) {
            foreach ($tags as $tag) {
                $this->processTag($tag, $record);
            }
        }

        $taxonomy = $cna['taxonomyMappings'] ?? null;

        if (true === is_array($taxonomy) && true === array_is_list($taxonomy)) {
            foreach ($taxonomy as $taxonomyItem) {
                $this->processTaxonomy($taxonomyItem, $record);
            }
        }

        $assignedAt = $cna['dateAssigned'] ?? null;

        if (true === is_string($assignedAt)) {
            // do something with assigned at
        }

        $publicAt = $cna['datePublic'] ?? null;

        if (true === is_string($publicAt)) {
            // do something with public at
        }
    }

    private function processCNARejected(array $cna, Record $record): void
    {
    }

    private function processProviderMetadata(array $providerMetadata, Record $record): void
    {
    }

    private function processDescription(array $description, Record $record): void
    {
    }

    private function processAffected(array $affected, Record $record): void
    {
    }

    private function processReference(array $reference, Record $record): void
    {
    }

    private function processCPEApplicability(array $cpeApplicability, Record $record): void
    {
    }

    private function processProblem(array $problem, Record $record): void
    {
    }

    private function processImpact(array $impact, Record $record): void
    {
    }

    private function processMetric(array $metric, Record $record): void
    {
    }

    private function processConfiguration(array $configuration, Record $record): void
    {
    }

    private function processWorkaround(array $workaround, Record $record): void
    {
    }

    private function processSolution(array $solution, Record $record): void
    {
    }

    private function processExploit(array $exploit, Record $record): void
    {
    }

    private function processTimeline(array $timeline, Record $record): void
    {
    }

    private function processSource(array $source, Record $record): void
    {
    }

    private function processCredit(array $credit, Record $record): void
    {
    }

    private function processTag(array $tag, Record $record): void
    {
    }

    private function processTaxonomy(array $taxonomy, Record $record): void
    {
    }

    private function processADP(array $adp, Record $record): void
    {
    }
}
