<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\DTO;

final class IssueSearch
{
    public int $total;
    public int $p;
    public int $ps;
    public Paging $paging;
    public int $effortTotal;
    /**
     * @var Issue[]
     */
    public array $issues;
    /**
     * @var IssueComponent[]
     */
    public array $components;
}
