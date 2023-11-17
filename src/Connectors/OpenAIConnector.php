<?php

namespace ChrisReedIO\OpenAI\SDK\Connectors;

use ChrisReedIO\OpenAI\SDK\Resources\Assistants;
// use ChrisReedIO\OpenAI\SDK\Resource\Audio;
// use ChrisReedIO\OpenAI\SDK\Resource\Chat;
// use ChrisReedIO\OpenAI\SDK\Resource\Completions;
// use ChrisReedIO\OpenAI\SDK\Resource\Edits;
// use ChrisReedIO\OpenAI\SDK\Resource\Embeddings;
// use ChrisReedIO\OpenAI\SDK\Resource\Files;
// use ChrisReedIO\OpenAI\SDK\Resource\FineTunes;
// use ChrisReedIO\OpenAI\SDK\Resource\FineTuning;
// use ChrisReedIO\OpenAI\SDK\Resource\Images;
// use ChrisReedIO\OpenAI\SDK\Resource\Moderations;
use ChrisReedIO\OpenAI\SDK\Resources\Models;
use Saloon\Http\Connector;

/**
 * OpenAI API
 *
 * The OpenAI REST API. Please see https://platform.openai.com/docs/api-reference for more details.
 */
class OpenAIConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://api.openai.com/v1';
    }

    public function __construct()
    {
        $this->withTokenAuth(config('openai-sdk.api_key'));
    }

    // public function assistants(): Assistants
    // {
    //     return new Assistants($this);
    // }
    //
    // public function models(): Models
    // {
    //     return new Models($this);
    // }

    // public function audio(): Audio
    // {
    //     return new Audio($this);
    // }
    //
    //
    // public function chat(): Chat
    // {
    //     return new Chat($this);
    // }
    //
    //
    // public function completions(): Completions
    // {
    //     return new Completions($this);
    // }
    //
    //
    // public function edits(): Edits
    // {
    //     return new Edits($this);
    // }
    //
    //
    // public function embeddings(): Embeddings
    // {
    //     return new Embeddings($this);
    // }
    //
    //
    // public function files(): Files
    // {
    //     return new Files($this);
    // }
    //
    //
    // public function fineTunes(): FineTunes
    // {
    //     return new FineTunes($this);
    // }
    //
    //
    // public function fineTuning(): FineTuning
    // {
    //     return new FineTuning($this);
    // }
    //
    //
    // public function images(): Images
    // {
    //     return new Images($this);
    // }
    //
    //
    //
    //
    // public function moderations(): Moderations
    // {
    //     return new Moderations($this);
    // }
}
