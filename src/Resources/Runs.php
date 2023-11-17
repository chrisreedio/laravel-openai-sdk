<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Requests\Runs\CancelRun;
use ChrisReedIO\OpenAI\SDK\Requests\Runs\CreateRun;
use ChrisReedIO\OpenAI\SDK\Requests\Runs\GetRun;
use ChrisReedIO\OpenAI\SDK\Requests\Runs\ListRuns;
use ChrisReedIO\OpenAI\SDK\Requests\Runs\ModifyRun;
use ChrisReedIO\OpenAI\SDK\Requests\Runs\SubmitToolOuputsToRun;
use ReflectionException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Throwable;

class Runs extends BaseResource
{
    /**
     * @param string $threadId The ID of the thread the run belongs to.
     * @param int|null $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param string|null $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param string|null $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function list(string $threadId, ?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListRuns($threadId, $limit, $order, $before));
    }

    /**
     * @param string $threadId The ID of the thread to run.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function create(string $threadId): Response
    {
        return $this->connector->send(new CreateRun($threadId));
    }

    /**
     * @param string $threadId The ID of the [thread](/docs/api-reference/threads) that was run.
     * @param string $runId The ID of the run to retrieve.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $threadId, string $runId): Response
    {
        return $this->connector->send(new GetRun($threadId, $runId));
    }

    /**
     * @param string $threadId The ID of the [thread](/docs/api-reference/threads) that was run.
     * @param string $runId The ID of the run to modify.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function modify(string $threadId, string $runId): Response
    {
        return $this->connector->send(new ModifyRun($threadId, $runId));
    }

    /**
     * @param string $threadId The ID of the [thread](/docs/api-reference/threads) to which this run belongs.
     * @param string $runId The ID of the run that requires the tool output submission.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function submitToolOuputs(string $threadId, string $runId): Response
    {
        return $this->connector->send(new SubmitToolOuputsToRun($threadId, $runId));
    }

    /**
     * @param string $threadId The ID of the thread to which this run belongs.
     * @param string $runId The ID of the run to cancel.
     * @return Response
     * @throws ReflectionException
     * @throws Throwable
     */
    public function cancel(string $threadId, string $runId): Response
    {
        return $this->connector->send(new CancelRun($threadId, $runId));
    }
}
