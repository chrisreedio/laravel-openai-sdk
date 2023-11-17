<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Requests\Messages\CreateMessage;
use ChrisReedIO\OpenAI\SDK\Requests\Messages\GetMessage;
use ChrisReedIO\OpenAI\SDK\Requests\Messages\ListMessages;
use ChrisReedIO\OpenAI\SDK\Requests\Messages\ModifyMessage;
use ReflectionException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Throwable;

class Messages extends BaseResource
{
    public function files(): MessagesFiles
    {
        return new MessagesFiles($this->connector);
    }

    /**
     * @param string $threadId The ID of the [thread](/docs/api-reference/threads) the messages belong to.
     * @param int|null $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param string|null $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param string|null $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function list(string $threadId, ?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListMessages($threadId, $limit, $order, $before));
    }

    /**
     * @param string $threadId The ID of the [thread](/docs/api-reference/threads) to create a message for.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function create(string $threadId): Response
    {
        return $this->connector->send(new CreateMessage($threadId));
    }

    /**
     * @param string $threadId The ID of the [thread](/docs/api-reference/threads) to which this message belongs.
     * @param string $messageId The ID of the message to retrieve.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $threadId, string $messageId): Response
    {
        return $this->connector->send(new GetMessage($threadId, $messageId));
    }

    /**
     * @param string $threadId The ID of the thread to which this message belongs.
     * @param string $messageId The ID of the message to modify.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function modify(string $threadId, string $messageId): Response
    {
        return $this->connector->send(new ModifyMessage($threadId, $messageId));
    }
}
