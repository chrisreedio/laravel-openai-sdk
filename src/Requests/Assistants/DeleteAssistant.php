<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteAssistant
 */
class DeleteAssistant extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/assistants/{$this->assistantId}";
    }

    /**
     * @param  string  $assistantId The ID of the assistant to delete.
     */
    public function __construct(
        protected string $assistantId,
    ) {
    }
}
