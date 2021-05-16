<?php

declare(strict_types=1);

namespace CE\Infrastructure\Ui\Console;

use CE\Application\Service\GetStudentGradesRequest;
use CE\Application\Service\GetStudentGradesUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class GradesCommand extends Command
{
    protected static $defaultName = 'app:grades';

    private $getStudentGradesUseCase;

    public function __construct(GetStudentGradesUseCase $getStudentGradesUseCase)
    {
        $this->getStudentGradesUseCase = $getStudentGradesUseCase;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Get student grades')
            ->addArgument('name', InputArgument::REQUIRED, 'Student name')
            ->addArgument('term', InputArgument::REQUIRED, 'School course term')
            ->addOption('description', 'd', InputOption::VALUE_NONE, 'Show describable (not numeric) grade')
            ->setHelp('Example: app:grades John 1 -d');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $response = ($this->getStudentGradesUseCase)(
                new GetStudentGradesRequest(
                    (string) $input->getArgument('name'),
                    (int) $input->getArgument('term'),
                    (bool) $input->getOption('description')
                )
            );

            $output->writeln('Resultat: '.$response->grade());
        } catch (\Exception $e) {
            $output->writeln('Error!!!');
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
