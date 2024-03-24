<?php

declare(strict_types=1);

namespace Eldahar\SonarQubeAPIBundle\Factory;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;

final class SonarQubeClientFactory
{
    public function __invoke(array $config, string $apiKey): ClientInterface
    {
        $handlerStack = HandlerStack::create($config['handler'] ?? null);
        $config = array_merge($config, [
            'base_uri' => rtrim($config['base_uri'] ?? '', '/') . '/',
            'handler' => $handlerStack,
        ]);
        $handlerStack->unshift(
            Middleware::mapRequest(
                static function (RequestInterface $request) use($apiKey) {
                    return $request->withHeader(
                        'Authorization',
                        "Bearer {$apiKey}"
                    );
                }
            )
        );

        return new Client($config);
    }
}
