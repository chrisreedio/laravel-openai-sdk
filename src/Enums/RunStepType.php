<?php

namespace ChrisReedIO\OpenAI\SDK\Enums;

enum RunStepType: string
{
    case MESSAGE_CREATION = 'message_creation';
    case TOOL_CALLS = 'tool_calls';
}
