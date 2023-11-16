<?php

namespace ChrisReedIO\OpenAI\SDK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\OpenAI\SDK\OpenAiClient
 */
class OpenAiClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ChrisReedIO\OpenAI\SDK\OpenAiClient::class;
    }
}
