<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\DTO;

final class Paging
{
    public int $pageIndex;
    public int $pageSize;
    public int $total;
}
