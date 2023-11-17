<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Threads;

use ChrisReedIO\OpenAI\SDK\Data\ThreadObject;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create an OpenAI Thread
 */
class CreateThread extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/threads';
    }

    public function __construct(
        protected ?array $messages = null,
        protected ?array $metadata = null,
    ) {

    }

    protected function defaultBody(): array
    {
        return array_filter([
            'messages' => $this->messages,
            'metadata' => $this->metadata,
        ]);
    }

    /**
     * Cast the response to a DTO object.
     *
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): ThreadObject
    {
        return ThreadObject::fromArray($response->json());
    }
}
