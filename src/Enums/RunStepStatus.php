<?php

namespace ChrisReedIO\OpenAI\SDK\Enums;

enum RunStepStatus: string
{
    case IN_PROGRESS = 'in_progress';
    case CANCELLED = 'cancelled';
    case FAILED = 'failed';
    case COMPLETED = 'completed';
    case EXPIRED = 'expired';
    
}
