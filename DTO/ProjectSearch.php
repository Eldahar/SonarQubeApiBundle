<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\DTO;

final class ProjectSearch
{
    public Paging $paging;
    /**
     * @var ProjectComponent[]
     */
    public array $components;
}
