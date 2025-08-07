<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Table\CVE;

use App\Console\Output\Style\Table\Common\TableField;
use App\Console\Output\Style\Table\Common\TableFieldString;
use App\Persistence\Document\CVE\Affected;
use App\Persistence\Document\CVE\Credit;
use App\Persistence\Document\CVE\Description;
use App\Persistence\Document\CVE\Metric;
use App\Persistence\Enum\CVE\AffectionStatus;
use Doctrine\Common\Collections\Collection;

trait CNACommon
{
    /**
     * @param iterable<int, Description> $descriptions
     */
    protected function descriptionsField(iterable $descriptions): TableField
    {
        $field = new TableField('descriptions');

        foreach ($descriptions as $i => $description) {
            if (null === $description) {
                continue;
            }

            $content = $description->getContent();

            if (null === $content) {
                continue;
            }

            $field = $field->addLine($i, $content);
        }

        return $field;
    }

    /**
     * @param iterable<int, Affected> $affected
     */
    protected function affectedField(iterable $affected): TableField
    {
        $field = new TableField('affected');

        foreach ($affected as $i => $item) {
            if (null === $item) {
                continue;
            }

            $product = $item->getProduct();

            if (null !== $product) {
                $vendor = sprintf('vendor: %s', $product->getVendor());
                $name = sprintf('product: %s', $product->getProduct());

                $field = $field->addLine($i, $vendor);
                $field = $field->addLine($i, $name);
            }

            $package = $item->getPackage();

            if (null !== $package) {
                $url = sprintf('package: %s', $package->getCollectionUrl());
                $name = sprintf('name: %s', $package->getName());

                $field = $field->addLine($i, $url);
                $field = $field->addLine($i, $name);
            }

            $platforms = $item->getPlatforms();

            if (null !== $platforms) {
                $field = $field->addLine($i, 'platforms:');

                foreach ($platforms as $platform) {
                    $platform = sprintf('    %s', $platform);

                    $field = $field->addLine($i, $platform);
                }
            }

            $cpes = $item->getCpe();

            if (null !== $cpes) {
                $field = $field->addLine($i, 'cpes:');

                foreach ($cpes as $cpe) {
                    $cpe = sprintf('    %s', $cpe);

                    $field = $field->addLine($i, $cpe);
                }
            }

            $affected = $item->getVersions();

            if ($affected instanceof AffectionStatus) {
                $name = sprintf('status: %s', $affected->name);

                $field = $field->addLine($i, $name);
            }

            if (in_array(Collection::class, class_implements($affected), true)) {
                $field = $field->addLine($i, 'versions:');

                foreach ($affected as $version) {
                    $lessThanOrEqual = $version->getLessThanOrEqual();
                    $lessThan = $version->getLessThan();
                    $type = $version->getType() ?? 'unknown';
                    $name = $version->getVersion();

                    if (null !== $lessThanOrEqual) {
                        $string = sprintf('    <= %s (%s)', $lessThanOrEqual, $type);

                        $field = $field->addLine($i, $string);
                    } elseif (null !== $lessThan) {
                        $string = sprintf('    < %s (%s)', $lessThan, $type);

                        $field = $field->addLine($i, $string);
                    } elseif (null !== $name) {
                        $string = sprintf('    %s (%s)', $name, $type);

                        $field = $field->addLine($i, $string);
                    }
                }
            }
        }

        return $field;
    }

    /**
     * @param iterable<int, Metric> $metrics
     */
    protected function metricsField(iterable $metrics): TableField
    {
        $field = new TableField('metrics');

        foreach ($metrics as $i => $metric) {
            if (null === $metric) {
                continue;
            }

            $cvss = $metric->getCvss();

            if (null !== $cvss) {
                foreach ($cvss as $vector) {
                    $field = $field->addLine($i, $vector);
                }
            }

            $other = $metric->getOther();

            if (null !== $other) {
                $field = $field->addLine($i, 'unsupported metric');
            }
        }

        return $field;
    }

    /**
     * @param iterable<int, Credit> $credits
     */
    protected function creditsField(iterable $credits): TableField
    {
        $field = new TableField('credits');

        foreach ($credits as $i => $credit) {
            if (null === $credit) {
                continue;
            }

            $language = $credit->getLanguage();

            if (null !== $language) {
                $string = sprintf('language: %s', $language);

                $field = $field->addLine($i, $string);
            }

            $user = $credit->getUser();

            if (null !== $user) {
                $string = sprintf('user: %s', $user);

                $field = $field->addLine($i, $string);
            }

            $type = $credit->getType();

            if (null !== $type) {
                $string = sprintf('type: %s', $type->name);

                $field = $field->addLine($i, $string);
            }

            $content = $credit->getContent();

            if (null !== $content) {
                $field = $field->addLine($i, 'description:');

                $fieldString = new TableFieldString($content, 100);

                foreach ($fieldString->toRows() as $row) {
                    $field = $field->addLine($i, "    $row");
                }
            }
        }

        return $field;
    }
}
