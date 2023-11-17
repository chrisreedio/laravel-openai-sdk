<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use ChrisReedIO\OpenAI\SDK\Data\AssistantObject;
use ChrisReedIO\OpenAI\SDK\Enums\ListOrder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

/**
 * listAssistants
 */
class ListAssistants extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/assistants';
    }

    /**
     * @param  ListOrder  $order Sort order by the `created_at` timestamp of the objects.
     */
    public function __construct(
        protected ListOrder $order = ListOrder::Descending,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['order' => $this->order->value]);
    }

    /**
     * Cast the response to a collection of DTO objects.
     *
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): array
    {
        return $response->collect('data')->map(
            AssistantObject::fromArray(...)
        )->all();
    }
}
