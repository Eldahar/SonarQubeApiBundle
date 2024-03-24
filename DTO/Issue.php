<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\DTO;

use Eldahar\SonarQubeAPI\Enum\IssueSeverityEnum;
use Eldahar\SonarQubeAPI\Enum\IssueStatusEnum;

final class Issue
{
    public string $key;
    public string $rule;
    public IssueSeverityEnum $severity;
    public string $component;
    public string $project;
    public int $line;
    public string $hash;
    public array $textRange;
    public array $flows;
    public IssueStatusEnum $status;
    public string $message;
    public string $effort;
    public string $debt;
    public string $assignee;
    public string $author;
    public array $tags;
    public \DateTime $creationDate;
    public \DateTime $updateDate;
    public string $type;
    public string $scope;
    public bool $quickFixAvailable;
    public array $messageFormatting;
}
