<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use ChrisReedIO\OpenAI\SDK\Data\ModelDto;
use ChrisReedIO\OpenAI\SDK\Requests\Models\DeleteModel;
use ChrisReedIO\OpenAI\SDK\Requests\Models\ListModels;
use ChrisReedIO\OpenAI\SDK\Requests\Models\RetrieveModel;
use Illuminate\Support\Collection;
use ReflectionException;
use Saloon\Http\Response;
use Throwable;

class Models extends Resource
{
    /**
     * @return Collection<ModelDto>
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function list(): Collection
    {
        return $this->send(new ListModels())->dtoOrFail();
    }

    /**
     * @param  string  $model The ID of the model to use for this request
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function get(string $model): Response
    {
        return $this->send(new RetrieveModel($model));
    }

    /**
     * @param  string  $model The model to delete
     *
     * @throws ReflectionException
     * @throws Throwable
     */
    public function delete(string $model): Response
    {
        return $this->send(new DeleteModel($model));
    }
}
