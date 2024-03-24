<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\Handler;

use Eldahar\SonarQubeAPI\Service\IssueService;
use Eldahar\SonarQubeAPIBundle\DTO\IssueSearch;
use Eldahar\SonarQubeAPIBundle\DTO\IssuesWithComponents;
use Symfony\Component\Serializer\SerializerInterface;

final class IssueHandler
{
    public function __construct(
        private IssueService $issueService,
        private SerializerInterface $serializer,
    ) {
    }

    public function search(string $projectKey): IssuesWithComponents
    {
        $issues = [];
        $components = [];
        $page = 0;
        do {
            $page++;
            $response = $this->issueService->search($projectKey, $page);
            $contents = $response->getBody()->getContents();
            $search = $this->serializer->deserialize(
                $contents,
                IssueSearch::class,
                'json'
            );
            $issues[] = $search->issues;
            $components[] = $search->components;
        } while($page * $search->ps <= $search->total);

        return new IssuesWithComponents(
            array_merge(...$issues),
            array_merge(...$components)
        );
    }
}
