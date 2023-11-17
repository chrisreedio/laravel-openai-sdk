<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Runs;

use ChrisReedIO\OpenAI\SDK\Data\RunObject;
use ChrisReedIO\OpenAI\SDK\Enums\ListOrder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

use function array_filter;

/**
 * listRuns
 */
class ListRuns extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/runs";
    }

    /**
     * @param  string  $threadId The ID of the thread the run belongs to.
     * @param  ListOrder  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     */
    public function __construct(
        protected string $threadId,
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
            RunObject::fromArray(...)
        )->all();
    }
}
