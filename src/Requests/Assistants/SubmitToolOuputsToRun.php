<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * submitToolOuputsToRun
 */
class SubmitToolOuputsToRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/runs/{$this->runId}/submit_tool_outputs";
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) to which this run belongs.
     * @param  string  $runId The ID of the run that requires the tool output submission.
     */
    public function __construct(
        protected string $threadId,
        protected string $runId,
    ) {
    }
}
