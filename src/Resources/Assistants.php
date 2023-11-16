<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CancelRun;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateMessage;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateRun;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateThread;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\CreateThreadAndRun;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\DeleteAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\DeleteAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\DeleteThread;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetAssistantFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetMessage;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetMessageFile;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetRun;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetRunStep;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\GetThread;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListAssistantFiles;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListAssistants;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListMessageFiles;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListMessages;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListRuns;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ListRunSteps;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ModifyAssistant;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ModifyMessage;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ModifyRun;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\ModifyThread;
use ChrisReedIO\OpenAI\SDK\Requests\Assistants\SubmitToolOuputsToRun;
use ReflectionException;
use Saloon\Http\Response;
use Throwable;

class Assistants extends Resource
{
    /**
     * @param  ?int  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  ?string  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  ?string  $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     */
    public function listAssistants(?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListAssistants($limit, $order, $before));
    }

    public function createAssistant(): Response
    {
        return $this->connector->send(new CreateAssistant());
    }

    /**
     * @param  string  $assistantId The ID of the assistant to retrieve.
     */
    public function getAssistant(string $assistantId): Response
    {
        return $this->connector->send(new GetAssistant($assistantId));
    }

    /**
     * @param  string  $assistantId The ID of the assistant to modify.
     */
    public function modifyAssistant(string $assistantId): Response
    {
        return $this->connector->send(new ModifyAssistant($assistantId));
    }

    /**
     * @param  string  $assistantId The ID of the assistant to delete.
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function deleteAssistant(string $assistantId): Response
    {
        return $this->connector->send(new DeleteAssistant($assistantId));
    }

    public function createThread(): Response
    {
        return $this->connector->send(new CreateThread());
    }

    /**
     * @param  string  $threadId The ID of the thread to retrieve.
     */
    public function getThread(string $threadId): Response
    {
        return $this->connector->send(new GetThread($threadId));
    }

    /**
     * @param  string  $threadId The ID of the thread to modify. Only the `metadata` can be modified.
     */
    public function modifyThread(string $threadId): Response
    {
        return $this->connector->send(new ModifyThread($threadId));
    }

    /**
     * @param  string  $threadId The ID of the thread to delete.
     */
    public function deleteThread(string $threadId): Response
    {
        return $this->connector->send(new DeleteThread($threadId));
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) the messages belong to.
     * @param  int  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  string  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  string  $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     */
    public function listMessages(string $threadId, ?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListMessages($threadId, $limit, $order, $before));
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) to create a message for.
     */
    public function createMessage(string $threadId): Response
    {
        return $this->connector->send(new CreateMessage($threadId));
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) to which this message belongs.
     * @param  string  $messageId The ID of the message to retrieve.
     */
    public function getMessage(string $threadId, string $messageId): Response
    {
        return $this->connector->send(new GetMessage($threadId, $messageId));
    }

    /**
     * @param  string  $threadId The ID of the thread to which this message belongs.
     * @param  string  $messageId The ID of the message to modify.
     */
    public function modifyMessage(string $threadId, string $messageId): Response
    {
        return $this->connector->send(new ModifyMessage($threadId, $messageId));
    }

    public function createThreadAndRun(): Response
    {
        return $this->connector->send(new CreateThreadAndRun());
    }

    /**
     * @param  string  $threadId The ID of the thread the run belongs to.
     * @param  int  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  string  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  string  $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     */
    public function listRuns(string $threadId, ?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListRuns($threadId, $limit, $order, $before));
    }

    /**
     * @param  string  $threadId The ID of the thread to run.
     */
    public function createRun(string $threadId): Response
    {
        return $this->connector->send(new CreateRun($threadId));
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) that was run.
     * @param  string  $runId The ID of the run to retrieve.
     */
    public function getRun(string $threadId, string $runId): Response
    {
        return $this->connector->send(new GetRun($threadId, $runId));
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) that was run.
     * @param  string  $runId The ID of the run to modify.
     */
    public function modifyRun(string $threadId, string $runId): Response
    {
        return $this->connector->send(new ModifyRun($threadId, $runId));
    }

    /**
     * @param  string  $threadId The ID of the [thread](/docs/api-reference/threads) to which this run belongs.
     * @param  string  $runId The ID of the run that requires the tool output submission.
     */
    public function submitToolOuputsToRun(string $threadId, string $runId): Response
    {
        return $this->connector->send(new SubmitToolOuputsToRun($threadId, $runId));
    }

    /**
     * @param  string  $threadId The ID of the thread to which this run belongs.
     * @param  string  $runId The ID of the run to cancel.
     */
    public function cancelRun(string $threadId, string $runId): Response
    {
        return $this->connector->send(new CancelRun($threadId, $runId));
    }

    /**
     * @param  string  $threadId The ID of the thread the run and run steps belong to.
     * @param  string  $runId The ID of the run the run steps belong to.
     * @param  int  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  string  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  string  $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     */
    public function listRunSteps(string $threadId, string $runId, ?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListRunSteps($threadId, $runId, $limit, $order, $before));
    }

    /**
     * @param  string  $threadId The ID of the thread to which the run and run step belongs.
     * @param  string  $runId The ID of the run to which the run step belongs.
     * @param  string  $stepId The ID of the run step to retrieve.
     */
    public function getRunStep(string $threadId, string $runId, string $stepId): Response
    {
        return $this->connector->send(new GetRunStep($threadId, $runId, $stepId));
    }

    /**
     * @param  string  $assistantId The ID of the assistant the file belongs to.
     * @param  int  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  string  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  string  $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     */
    public function listAssistantFiles(string $assistantId, ?int $limit, ?string $order, ?string $before): Response
    {
        return $this->connector->send(new ListAssistantFiles($assistantId, $limit, $order, $before));
    }

    /**
     * @param  string  $assistantId The ID of the assistant for which to create a File.
     */
    public function createAssistantFile(string $assistantId): Response
    {
        return $this->connector->send(new CreateAssistantFile($assistantId));
    }

    /**
     * @param  string  $assistantId The ID of the assistant who the file belongs to.
     * @param  string  $fileId The ID of the file we're getting.
     */
    public function getAssistantFile(string $assistantId, string $fileId): Response
    {
        return $this->connector->send(new GetAssistantFile($assistantId, $fileId));
    }

    /**
     * @param  string  $assistantId The ID of the assistant that the file belongs to.
     * @param  string  $fileId The ID of the file to delete.
     */
    public function deleteAssistantFile(string $assistantId, string $fileId): Response
    {
        return $this->connector->send(new DeleteAssistantFile($assistantId, $fileId));
    }

    /**
     * @param  string  $threadId The ID of the thread that the message and files belong to.
     * @param  string  $messageId The ID of the message that the files belongs to.
     * @param  int  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 20.
     * @param  string  $order Sort order by the `created_at` timestamp of the objects. `asc` for ascending order and `desc` for descending order.
     * @param  string  $before A cursor for use in pagination. `before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with obj_foo, your subsequent call can include before=obj_foo in order to fetch the previous page of the list.
     */
    public function listMessageFiles(
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
     */
    public function getMessageFile(string $threadId, string $messageId, string $fileId): Response
    {
        return $this->connector->send(new GetMessageFile($threadId, $messageId, $fileId));
    }
}
