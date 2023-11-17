<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Messages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * listMessages
 */
class ListMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/threads/{$this->threadId}/messages";
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) the messages belong to.
     * @param  null|int  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  null|string  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  null|string  $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     */
    public function __construct(
        protected string $threadId,
        protected ?int $limit = null,
        protected ?string $order = null,
        protected ?string $before = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit, 'order' => $this->order, 'before' => $this->before]);
    }
}
