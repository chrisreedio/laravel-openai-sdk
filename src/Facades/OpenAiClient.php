<?php

namespace ChrisReedIO\\OpenAI\\SDK\OpenAiClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\\OpenAI\\SDK\OpenAiClient\OpenAiClient
 */
class OpenAiClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ChrisReedIO\\OpenAI\\SDK\OpenAiClient\OpenAiClient::class;
    }
}
