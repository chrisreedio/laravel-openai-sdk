<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * cancelRun
 */
class CancelRun extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/threads/{$this->threadId}/runs/{$this->runId}/cancel";
	}


	/**
	 * @param string $threadId The ID of the thread to which this run belongs.
	 * @param string $runId The ID of the run to cancel.
	 */
	public function __construct(
		protected string $threadId,
		protected string $runId,
	) {
	}
}
