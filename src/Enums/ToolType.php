<?php

namespace ChrisReedIO\OpenAI\SDK\Enums;

enum ToolType: string
{
    case CODE_INTERPRETER = 'code_interpreter';
    case RETRIEVAL = 'retrieval';
    case FUNCTION = 'function';
}
