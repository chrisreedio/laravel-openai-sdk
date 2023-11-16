<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants\File;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteAssistantFile
 */
class DeleteAssistantFile extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/assistants/{$this->assistantId}/files/{$this->fileId}";
    }

    /**
     * @param  string  $assistantId The ID of the assistant that the file belongs to.
     * @param  string  $fileId The ID of the file to delete.
     */
    public function __construct(
        protected string $assistantId,
        protected string $fileId,
    ) {
    }
}
