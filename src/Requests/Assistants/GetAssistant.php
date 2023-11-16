<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getAssistant
 */
class GetAssistant extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/assistants/{$this->assistantId}";
	}


	/**
	 * @param string $assistantId The ID of the assistant to retrieve.
	 */
	public function __construct(
		protected string $assistantId,
	) {
	}
}
