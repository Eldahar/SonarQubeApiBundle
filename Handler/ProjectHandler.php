<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\Handler;

use Eldahar\SonarQubeAPI\Service\ProjectService;
use Eldahar\SonarQubeAPIBundle\DTO\ProjectComponent;
use Eldahar\SonarQubeAPIBundle\DTO\ProjectSearch;
use Symfony\Component\Serializer\SerializerInterface;

final class ProjectHandler
{
    public function __construct(
        private ProjectService $projectService,
        private SerializerInterface $serializer,
    ) {
    }

    public function search(string $projectKey): ProjectComponent
    {
        $response = $this->projectService->search($projectKey);
        $contents = $response->getBody()->getContents();
        $search = $this->serializer->deserialize(
            $contents,
            ProjectSearch::class,
            'json'
        );

        return reset($search->components);
    }
}
