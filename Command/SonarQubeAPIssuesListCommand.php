<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\Command;

use Eldahar\SonarQubeAPIBundle\Handler\IssueHandler;
use Eldahar\SonarQubeAPIBundle\Handler\ProjectHandler;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(SonarQubeAPIssuesListCommand::NAME)]
final class SonarQubeAPIssuesListCommand extends Command
{
    public const NAME = 'sonarqube:issues:list';
    public const PROJECT_KEY = 'projectKey';

    public function __construct(
        private IssueHandler $issueHandler,
        private ProjectHandler $projectHandler,
    ) {
        parent::__construct();
    }


    protected function configure()
    {
        $this->setDescription('SonarQube Issues list')
            ->addArgument(self::PROJECT_KEY,  InputArgument::REQUIRED, 'Project key');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $projectKey = $input->getArgument(self::PROJECT_KEY);
        $project = $this->projectHandler->search($projectKey);
        $issues = $this->issueHandler->search($projectKey);
        dump($issues);

        return Command::SUCCESS;
    }
}
