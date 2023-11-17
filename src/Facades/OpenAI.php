<?php

namespace ChrisReedIO\OpenAI\SDK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\OpenAI\SDK\OpenAI
 */
class OpenAI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ChrisReedIO\OpenAI\SDK\OpenAI::class;
    }
}
