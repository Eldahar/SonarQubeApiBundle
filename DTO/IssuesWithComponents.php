<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\DTO;

final class IssuesWithComponents
{
    /**
     * @var Issue[]
     */
    private array $issues;
    /**
     * @var IssueComponent[]
     */
    private array $components;

    public function __construct(array $issues, array $components)
    {
        $this->issues = $issues;
        $this->components = $components;
    }

    public function getIssues(): array
    {
        return $this->issues;
    }

    public function hasIssues(): bool
    {
        return isset($this->issues);
    }

    public function setIssues(array $issues): void
    {
        $this->issues = $issues;
    }

    public function getComponents(): array
    {
        return $this->components;
    }

    public function hasComponents(): bool
    {
        return isset($this->components);
    }

    public function setComponents(array $components): void
    {
        $this->components = $components;
    }
}
