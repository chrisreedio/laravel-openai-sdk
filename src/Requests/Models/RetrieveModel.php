<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Models;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * retrieveModel
 */
class RetrieveModel extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/models/{$this->model}";
    }

    /**
     * @param  string  $model The ID of the model to use for this request
     */
    public function __construct(
        protected string $model,
    ) {
    }
}
