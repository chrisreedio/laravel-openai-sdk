<?php

namespace ChrisReedIO\OpenAI\SDK\Resources;

use Saloon\Http\Connector;

abstract class Resource
{
    public function __construct(
        protected Connector $connector,
    )
    {
    }
}
