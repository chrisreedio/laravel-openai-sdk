<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Assistants;

use ChrisReedIO\OpenAI\SDK\Enums\ListOrder;
use Saloon\Enums\Method;
use Saloon\Http\Request;
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
     * @param  null|ListOrder  $order Sort order by the `created_at` timestamp of the objects.
     */
    public function __construct(
        protected ?ListOrder $order = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['order' => $this->order?->value]);
    }
}
