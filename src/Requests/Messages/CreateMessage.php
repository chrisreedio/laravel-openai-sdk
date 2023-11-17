<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Messages;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createMessage
 */
class CreateMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/messages";
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) to create a message for.
     */
    public function __construct(
        protected string $threadId,
    ) {
    }
}
