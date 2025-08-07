<?php

declare(strict_types=1);

namespace App\Console\Command\CVE;

use App\Console\Input\CVE\FindInput;
use App\Console\Output\CVE\FindOutput;
use App\Persistence\Document\CVE\Record;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'pp:cve:find',
    description: 'Find cve records by specific parameters.',
)]
final class FindCommand extends Command
{
    public function __construct(
        private readonly DocumentManager $documentManager,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        FindInput::configure($this);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $input = new FindInput($input);
        $output = new FindOutput($output);

        $builder = $this->documentManager->createQueryBuilder(Record::class);

        //        $criteria = array_merge(
        //            $input->id(),
        //            $input->title(),
        //            $input->published(),
        //            $input->updated(),
        //            $input->reserved(),
        //            $input->rejected(),
        //            $input->assigner(),
        //            $input->description(),
        //            $input->configuration(),
        //            $input->workaround(),
        //            $input->exploit(),
        //            $input->solution(),
        //            $input->affected(),
        //            $input->problem(),
        //            $input->providedBy(),
        //            $input->cpe(),
        //            $input->metric(),
        //        );

        //        foreach ($criteria as $item) {
        //        }

        foreach ($input->id() as $id) {
            $builder = $builder->field('id')->equals($id);
        }

        foreach ($input->published() as $published) {
            $builder = $builder->field('metadata.publishedAt')->equals($published);
        }

        foreach ($input->updated() as $updated) {
            $builder = $builder->field('metadata.updatedAt')->equals($updated);
        }

        foreach ($input->reserved() as $reserved) {
            $builder = $builder->field('metadata.reservedAt')->equals($reserved);
        }

        foreach ($input->rejected() as $rejected) {
            $builder = $builder->field('metadata.rejectedAt')->equals($rejected);
        }

        foreach ($input->assigner() as $assigner) {
            $builder = $builder->field('assigner.orgName')->equals($assigner);
        }

        $index = 0;

        /**
         * @var Record $record
         */
        foreach ($builder->getQuery()->execute() as $record) {
            if (0 === $index) {
                $output->searchStart();
            }

            ++$index;

            $output->recordFound($record);
        }

        if (0 === $index) {
            $output->nothingFound();

            return Command::FAILURE;
        }

        $output->searchEnd();

        return Command::SUCCESS;
    }
}
