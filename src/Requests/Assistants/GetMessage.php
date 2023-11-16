<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getMessage
 */
class GetMessage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/messages/{$this->messageId}";
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) to which this message belongs.
     * @param  string  $messageId The ID of the message to retrieve.
     */
    public function __construct(
        protected string $threadId,
        protected string $messageId,
    ) {
    }
}
