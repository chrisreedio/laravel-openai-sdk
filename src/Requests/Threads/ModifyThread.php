<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Threads;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * modifyThread
 */
class ModifyThread extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}";
    }

    /**
     * @param  string  $threadId The ID of the thread to modify. Only the `metadata` can be modified.
     */
    public function __construct(
        protected string $threadId,
    ) {
    }
}
