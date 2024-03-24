<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\DTO;

final class IssueComponent
{
    public string $key;
    public bool $enabled;
    public string $qualifier;
    public string $name;
    public string $longName;
    public string $path;
}
