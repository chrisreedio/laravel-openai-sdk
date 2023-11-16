<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Threads;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createThreadAndRun
 */
class CreateThreadAndRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/threads/runs';
    }

    public function __construct()
    {
    }
}
