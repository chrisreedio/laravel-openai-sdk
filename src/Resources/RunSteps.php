<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Requests\RunSteps\GetRunStep;
use ChrisReedIO\OpenAI\SDK\Requests\RunSteps\ListRunSteps;
use ReflectionException;
use Saloon\Http\Response;
use Throwable;

class RunSteps extends BaseResource
{
    /**
     * @param string $threadId The ID of the thread the run and run steps belong to.
     * @param string $runId The ID of the run that the run steps belong to.
     * @param int|null $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param string|null $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param string|null $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function list(string $threadId, string $runId, ?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListRunSteps($threadId, $runId, $limit, $order, $before));
    }

    /**
     * @param string $threadId The ID of the thread to which the run and run step belongs.
     * @param string $runId The ID of the run to which the run step belongs.
     * @param string $stepId The ID of the run step to retrieve.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $threadId, string $runId, string $stepId): Response
    {
        return $this->connector->send(new GetRunStep($threadId, $runId, $stepId));
    }
}
