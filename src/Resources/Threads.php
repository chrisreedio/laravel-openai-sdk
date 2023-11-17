<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Requests\Threads\CreateThread;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\CreateThreadAndRun;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\DeleteThread;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\GetThread;
use ChrisReedIO\OpenAI\SDK\Requests\Threads\ModifyThread;
use ReflectionException;
use Saloon\Http\Response;
use Throwable;

class Threads extends BaseResource
{
    /**
     * @throws ReflectionException
     * @throws Throwable
     */
    public function create(): Response
    {
        return $this->connector->send(new CreateThread());
    }

    /**
     * @param  string  $threadId The ID of the thread to retrieve.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $threadId): Response
    {
        return $this->connector->send(new GetThread($threadId));
    }

    /**
     * @param  string  $threadId The ID of the thread to modify. Only the `metadata` can be modified.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function modify(string $threadId): Response
    {
        return $this->connector->send(new ModifyThread($threadId));
    }

    /**
     * @param  string  $threadId The ID of the thread to delete.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function delete(string $threadId): Response
    {
        return $this->connector->send(new DeleteThread($threadId));
    }

    /**
     * @throws ReflectionException
     * @throws Throwable
     */
    public function createAndRun(): Response
    {
        return $this->connector->send(new CreateThreadAndRun());
    }
}
