<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createAssistantFile
 */
class CreateAssistantFile extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/assistants/{$this->assistantId}/files";
	}


	/**
	 * @param string $assistantId The ID of the assistant for which to create a File.
	 */
	public function __construct(
		protected string $assistantId,
	) {
	}
}
