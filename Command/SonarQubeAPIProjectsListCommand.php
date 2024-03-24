<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\Command;

use Eldahar\SonarQubeAPI\Service\ProjectService;
use GuzzleHttp\Client;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(SonarQubeAPIProjectsListCommand::NAME)]
final class SonarQubeAPIProjectsListCommand extends Command
{
    public const NAME = 'sonarqube:projects:list';
    public const TOKEN = 'token';

    protected function configure()
    {
        $this->setDescription('SonarQube projects list')
            ->addArgument(self::TOKEN, InputArgument::REQUIRED, 'SonarQube unique token');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $token = $input->getArgument(self::TOKEN);
        $client = new Client(config: [
            'base_uri' => 'http://eldahar.hu:9000',
            'headers' => [
                'Authorization' => "Bearer {$token}"
            ]
        ]);
        $projectService = new ProjectService($client);
        dump($projectService->search());


        return Command::SUCCESS;
    }
}
