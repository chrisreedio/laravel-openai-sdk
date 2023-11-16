<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * modifyMessage
 */
class ModifyMessage extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/messages/{$this->messageId}";
    }

    /**
     * @param  string  $threadId The ID of the thread to which this message belongs.
     * @param  string  $messageId The ID of the message to modify.
     */
    public function __construct(
        protected string $threadId,
        protected string $messageId,
    ) {
    }
}
