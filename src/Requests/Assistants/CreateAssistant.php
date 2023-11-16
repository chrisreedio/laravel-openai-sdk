<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createAssistant
 */
class CreateAssistant extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/assistants";
	}


	public function __construct()
	{
	}
}
