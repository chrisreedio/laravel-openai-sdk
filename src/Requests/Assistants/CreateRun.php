<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createRun
 */
class CreateRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/runs";
    }

    /**
     * @param  string  $threadId The ID of the thread to run.
     */
    public function __construct(
        protected string $threadId,
    ) {
    }
}
