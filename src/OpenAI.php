<?php

namespace ChrisReedIO\OpenAI\SDK;

use ChrisReedIO\OpenAI\SDK\Connectors\OpenAIConnector;
use ChrisReedIO\OpenAI\SDK\Resources\Assistants;
use ChrisReedIO\OpenAI\SDK\Resources\Models;

class OpenAI
{
    protected OpenAIConnector $connector;

    public function __construct()
    {
        $this->connector = new OpenAIConnector();
    }

    /**
     * @return Assistants
     */
    public function assistants(): Assistants
    {
        return new Assistants($this->connector);
    }

    /**
     * @return Models
     */
    public function models(): Models
    {
        return new Models($this->connector);
    }
}
