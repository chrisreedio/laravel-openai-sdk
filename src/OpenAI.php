<?php

namespace ChrisReedIO\OpenAI\SDK;

use ChrisReedIO\OpenAI\SDK\Connectors\OpenAIConnector;
use ChrisReedIO\OpenAI\SDK\Resources\Assistants;
use ChrisReedIO\OpenAI\SDK\Resources\Models;
use ChrisReedIO\OpenAI\SDK\Resources\Threads;

class OpenAI
{
    protected OpenAIConnector $connector;

    public function __construct()
    {
        $this->connector = new OpenAIConnector();
    }

    public function assistants(): Assistants
    {
        return new Assistants($this->connector);
    }

    public function models(): Models
    {
        return new Models($this->connector);
    }

    public function threads(): Threads
    {
        return new Threads($this->connector);
    }
}
