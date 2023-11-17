<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Models;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * deleteModel
 */
class DeleteModel extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/models/{$this->model}";
    }

    /**
     * @param  string  $model The model to delete
     */
    public function __construct(
        protected string $model,
    ) {
    }
}
