<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getThread
 */
class GetThread extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}";
    }

    /**
     * @param  string  $threadId The ID of the thread to retrieve.
     */
    public function __construct(
        protected string $threadId,
    ) {
    }
}
