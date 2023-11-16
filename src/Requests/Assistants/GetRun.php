<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getRun
 */
class GetRun extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/threads/{$this->threadId}/runs/{$this->runId}";
	}


	/**
	 * @param string $threadId The ID of the [thread](/docs/api-reference/threads) that was run.
	 * @param string $runId The ID of the run to retrieve.
	 */
	public function __construct(
		protected string $threadId,
		protected string $runId,
	) {
	}
}
