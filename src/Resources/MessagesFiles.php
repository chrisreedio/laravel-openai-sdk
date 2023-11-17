<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Requests\Messages\File\GetMessageFile;
use ChrisReedIO\OpenAI\SDK\Requests\Messages\File\ListMessageFiles;
use ReflectionException;
use Saloon\Http\Response;
use Throwable;

class MessagesFiles extends BaseResource
{
    /**
     * @param  string  $threadId The ID of the thread that the message and files belong to.
     * @param  string  $messageId The ID of the message that the files belongs to.
     * @param  int|null  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  string|null  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  string|null  $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function list(
        string $threadId,
        string $messageId,
        ?int $limit,
        ?string $order,
        ?string $before,
    ): Response {
        return $this->connector->send(new ListMessageFiles($threadId, $messageId, $limit, $order, $before));
    }

    /**
     * @param  string  $threadId The ID of the thread to which the message and File belong.
     * @param  string  $messageId The ID of the message the file belongs to.
     * @param  string  $fileId The ID of the file being retrieved.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $threadId, string $messageId, string $fileId): Response
    {
        return $this->connector->send(new GetMessageFile($threadId, $messageId, $fileId));
    }
}
