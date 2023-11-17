<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\RunSteps;

use ChrisReedIO\OpenAI\SDK\Data\RunStepObject;
use ChrisReedIO\OpenAI\SDK\Enums\ListOrder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

use function array_filter;

/**
 * listRunSteps
 */
class ListRunSteps extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/runs/{$this->runId}/steps";
    }

    /**
     * @param  string  $threadId The ID of the thread the run and run steps belong to.
     * @param  string  $runId The ID of the run that the run steps belong to.
     * @param  ListOrder  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     */
    public function __construct(
        protected string $threadId,
        protected string $runId,
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
            RunStepObject::fromArray(...)
        )->all();
    }
}
