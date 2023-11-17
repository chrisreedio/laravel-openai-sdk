<?php

namespace ChrisReedIO\OpenAI\SDK\Enums;

enum MessageRole: string
{
    case System = 'system';
    case User = 'user';
    case Assistant = 'assistant';
}
