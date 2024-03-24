<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\DTO;

final class ProjectComponent
{
    public string $key;
    public string $name;
    public string $qualifier;
    public string $visibility;
    public \DateTime $lastAnalysisDate;
    public string $revision;
}
