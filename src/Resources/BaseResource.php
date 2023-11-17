<?php

declare(strict_types=1);

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Connectors\OpenAIConnector;

abstract class BaseResource
{
    /**
     * Constructor
     * @param OpenAIConnector $connector
     */
    public function __construct(readonly protected OpenAIConnector $connector)
    {
        //
    }
}
