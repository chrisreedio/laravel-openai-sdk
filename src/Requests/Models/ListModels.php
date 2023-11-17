<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Models;

use ChrisReedIO\OpenAI\SDK\Data\ModelDto;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * listModels
 */
class ListModels extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/models';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect('data')->map(
            ModelDto::fromItem(...)
        );
    }
}
