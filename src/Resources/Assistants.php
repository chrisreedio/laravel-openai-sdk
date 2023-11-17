<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\DeleteAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\File\CreateAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\File\DeleteAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\File\GetAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\File\ListAssistantFiles;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListAssistants;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ModifyAssistant;
use ReflectionException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Throwable;

class Assistants extends BaseResource
{
    public function files(): AssistantsFiles
    {
        return new AssistantsFiles($this->connector);
    }

    /**
     * @param  ?int $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  ?string $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  ?string $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function list(?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListAssistants($limit, $order, $before));
    }

    /**
     * @throws ReflectionException
     * @throws Throwable
     */
    public function create(): Response
    {
        return $this->connector->send(new CreateAssistant());
    }

    /**
     * @param string $assistantId The ID of the assistant to retrieve.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $assistantId): Response
    {
        return $this->connector->send(new GetAssistant($assistantId));
    }

    /**
     * @param string $assistantId The ID of the assistant to modify.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function modify(string $assistantId): Response
    {
        return $this->connector->send(new ModifyAssistant($assistantId));
    }

    /**
     * @param string $assistantId The ID of the assistant to delete.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function delete(string $assistantId): Response
    {
        return $this->connector->send(new DeleteAssistant($assistantId));
    }
}
