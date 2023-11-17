<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Requests\Assistants\File\CreateAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\File\DeleteAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\File\GetAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\File\ListAssistantFiles;
use ReflectionException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Throwable;

class AssistantsFiles extends BaseResource
{
    /**
     * @param string $assistantId The ID of the assistant the file belongs to.
     * @param int|null $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param string|null $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param string|null $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function list(string $assistantId, ?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListAssistantFiles($assistantId, $limit, $order, $before));
    }

    /**
     * @param string $assistantId The ID of the assistant for which to create a File.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function create(string $assistantId): Response
    {
        return $this->connector->send(new CreateAssistantFile($assistantId));
    }

    /**
     * @param string $assistantId The ID of the assistant who the file belongs to.
     * @param string $fileId The ID of the file we're getting.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $assistantId, string $fileId): Response
    {
        return $this->connector->send(new GetAssistantFile($assistantId, $fileId));
    }

    /**
     * @param string $assistantId The ID of the assistant that the file belongs to.
     * @param string $fileId The ID of the file to delete.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function delete(string $assistantId, string $fileId): Response
    {
        return $this->connector->send(new DeleteAssistantFile($assistantId, $fileId));
    }


}
