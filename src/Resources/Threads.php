<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Data\ThreadObject;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\CreateThread;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\CreateThreadAndRun;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\DeleteThread;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\GetThread;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\ModifyThread;
use Saloon\Http\Response;

class Threads extends BaseResource
{
    /**
     * @param array|null $messages An array of messages that will be used to create the thread.
     * @param array|null $metadata An optional mapping of metadata to be stored with the thread.
     */
    public function create(array $messages = null, array $metadata = null): ?ThreadObject
    {
        return $this->sendRequest(new CreateThread($messages, $metadata));
    }

    /**
     * @param string $threadId The ID of the thread to retrieve.
     */
    public function get(string $threadId): ?ThreadObject
    {
        return $this->sendRequest(new GetThread($threadId));
    }

    /**
     * @param string $threadId The ID of the thread to modify. Only the `metadata` can be modified.
     *
     */
    public function modify(string $threadId): ?ThreadObject
    {
        return $this->sendRequest(new ModifyThread($threadId));
    }

    /**
     * @param string $threadId The ID of the thread to delete.
     */
    public function delete(string $threadId): bool
    {
        return $this->send(new DeleteThread($threadId))?->successful() ?? false;
    }

    /**
     */
    public function createAndRun(): ?Response
    {
        return $this->send(new CreateThreadAndRun());
    }

}
