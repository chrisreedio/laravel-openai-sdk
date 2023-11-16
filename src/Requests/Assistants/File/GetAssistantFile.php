<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants\File;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getAssistantFile
 */
class GetAssistantFile extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/assistants/{$this->assistantId}/files/{$this->fileId}";
    }

    /**
     * @param  string  $assistantId The ID of the assistant who the file belongs to.
     * @param  string  $fileId The ID of the file we're getting.
     */
    public function __construct(
        protected string $assistantId,
        protected string $fileId,
    ) {
    }
}
