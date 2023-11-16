<?php

namespace ChrisReedIO\OpenAI\SDK\Requests\Threads;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * createThread
 */
class CreateThread extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/threads';
    }

    public function __construct()
    {
    }
}
