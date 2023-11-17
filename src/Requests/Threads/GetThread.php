<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Threads;

use ChrisReedIO\OpenAI\SDK\Data\ThreadObject;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * getThread
 */
class GetThread extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}";
    }

    /**
     * @param string $threadId The ID of the thread to retrieve.
     */
    public function __construct(
        protected string $threadId,
    )
    {
    }

    /**
     * Cast the response to a DTO object.
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): ThreadObject
    {
        return ThreadObject::fromArray($response->json());
    }
}
