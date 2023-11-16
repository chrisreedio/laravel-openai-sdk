<?php

namespace ChrisReedIO\OpenAI\SDK;

use ChrisReedIO\OpenAI\SDK\Connectors\OpenAiConnector;
use ChrisReedIO\OpenAI\SDK\Resources\Assistants;
use ChrisReedIO\OpenAI\SDK\Resources\Models;

class OpenAiClient
{
    protected OpenAiConnector $connector;

    public function __construct()
    {
        $this->connector = new OpenAiConnector();
    }

    public function assistants(): Assistants
    {
        return new Assistants($this->connector);
    }

    public function models(): Models
    {
        return new Models($this->connector);
    }
}
