<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * modifyAssistant
 */
class ModifyAssistant extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/assistants/{$this->assistantId}";
	}


	/**
	 * @param string $assistantId The ID of the assistant to modify.
	 */
	public function __construct(
		protected string $assistantId,
	) {
	}
}
