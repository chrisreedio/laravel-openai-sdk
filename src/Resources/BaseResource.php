<?php

declare(strict_types=1);

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Connectors\OpenAIConnector;
use ReflectionException;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Throwable;

abstract class BaseResource
{
    /**
     * Constructor
     */
    public function __construct(readonly protected OpenAIConnector $connector)
    {
        //
    }

    /**
     * Send a request to the OpenAI API.
     *
     * @param Request $request
     * @return ?Response
     */
    protected function send(Request $request): ?Response
    {
        try {
            return $this->connector->send($request);
        } catch (Throwable|ReflectionException $e) {
            // TODO - Add a debug mode that allows this to be logged or bubble up.
            return null;
        }
    }

    protected function sendRequest($request): mixed
    {
        $response = $this->send($request);

        if (!$response || $response->failed()) {
            return null;
        }

        return $response->dto();
    }
}
