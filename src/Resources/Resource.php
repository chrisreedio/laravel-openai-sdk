<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Connectors\OpenAiConnector;
use ReflectionException;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Throwable;

abstract class Resource
{
    public function __construct(
        protected OpenAiConnector $connector,
    )
    {
    }

    /**
     * @param Request $request
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    protected function send(Request $request): Response
    {
        return $this->connector->send($request);
    }
}
