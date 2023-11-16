<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteThread
 */
class DeleteThread extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/threads/{$this->threadId}";
	}


	/**
	 * @param string $threadId The ID of the thread to delete.
	 */
	public function __construct(
		protected string $threadId,
	) {
	}
}
