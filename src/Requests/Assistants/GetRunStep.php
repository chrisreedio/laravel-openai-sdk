<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getRunStep
 */
class GetRunStep extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/threads/{$this->threadId}/runs/{$this->runId}/steps/{$this->stepId}";
	}


	/**
	 * @param string $threadId The ID of the thread to which the run and run step belongs.
	 * @param string $runId The ID of the run to which the run step belongs.
	 * @param string $stepId The ID of the run step to retrieve.
	 */
	public function __construct(
		protected string $threadId,
		protected string $runId,
		protected string $stepId,
	) {
	}
}
