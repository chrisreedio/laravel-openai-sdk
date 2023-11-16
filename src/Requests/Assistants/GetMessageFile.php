<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getMessageFile
 */
class GetMessageFile extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/messages/{$this->messageId}/files/{$this->fileId}";
    }

    /**
     * @param  string  $threadId The ID of the thread to which the message and File belong.
     * @param  string  $messageId The ID of the message the file belongs to.
     * @param  string  $fileId The ID of the file being retrieved.
     */
    public function __construct(
        protected string $threadId,
        protected string $messageId,
        protected string $fileId,
    ) {
    }
}
