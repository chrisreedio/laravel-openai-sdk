<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Enums\ListOrder;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\DeleteAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListAssistants;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ModifyAssistant;
use ReflectionException;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;
use Throwable;

class Assistants extends BaseResource
{
    public function files(): AssistantsFiles
    {
        return new AssistantsFiles($this->connector);
    }

    /**
     * @param ListOrder|null $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param int $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @return Paginator
     */
    public function list(?ListOrder $order = null, int $limit = 100): Paginator
    {
        if ($limit > config('openai-sdk.max_per_page', 100)) {
            throw new \InvalidArgumentException("Limit cannot exceed " . config('openai-sdk.max_per_page', 100));
        }

        return $this->connector->paginate(new ListAssistants($order))->setPerPageLimit($limit);
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
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $assistantId): Response
    {
        return $this->connector->send(new GetAssistant($assistantId));
    }

    /**
     * @param string $assistantId The ID of the assistant to modify.
     *
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
