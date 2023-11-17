<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Runs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * modifyRun
 */
class ModifyRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/runs/{$this->runId}";
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) that was run.
     * @param  string  $runId The ID of the run to modify.
     */
    public function __construct(
        protected string $threadId,
        protected string $runId,
    ) {
    }
}
