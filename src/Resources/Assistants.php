<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Data\AssistantObject;
use ChrisReedIO\OpenAI\SDK\Enums\ListOrder;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\DeleteAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListAssistants;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ModifyAssistant;
use Saloon\PaginationPlugin\Paginator;

class Assistants extends BaseResource
{
    public function files(): AssistantsFiles
    {
        return new AssistantsFiles($this->connector);
    }

    /**
     * List OpenAI Assistants
     *
     * @param  ListOrder  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  int  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     */
    public function list(ListOrder $order = ListOrder::Descending, int $limit = 100): Paginator
    {
        if ($limit > config('openai-sdk.max_per_page', 100)) {
            throw new \InvalidArgumentException('Limit cannot exceed '.config('openai-sdk.max_per_page', 100));
        }

        return $this->connector->paginate(new ListAssistants($order))->setPerPageLimit($limit);
    }

    /**
     * Create an OpenAI Assistant
     */
    public function create(): ?AssistantObject
    {
        return $this->sendRequest(new CreateAssistant());
    }

    /**
     * Retrieve an OpenAI Assistant
     *
     * @param  string  $assistantId The ID of the assistant to retrieve.
     */
    public function get(string $assistantId): ?AssistantObject
    {
        return $this->sendRequest(new GetAssistant($assistantId));
    }

    /**
     * Modify an OpenAI Assistant
     *
     * @param  string  $assistantId The ID of the assistant to modify.
     */
    public function modify(string $assistantId): ?AssistantObject
    {
        return $this->sendRequest(new ModifyAssistant($assistantId));
    }

    /**
     * Delete an OpenAI Assistant
     *
     * @param  string  $assistantId The ID of the assistant to delete.
     */
    public function delete(string $assistantId): bool
    {
        return $this->send(new DeleteAssistant($assistantId))?->successful() ?? false;
    }
}
