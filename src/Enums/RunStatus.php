<?php

namespace ChrisReedIO\OpenAI\SDK\Enums;

enum RunStatus: string
{
    case QUEUED = 'queued';
    case IN_PROGRESS = 'in_progress';
    case REQUIRES_ACTION = 'requires_action';
    case CANCELLING = 'cancelling';
    case CANCELLED = 'cancelled';
    case FAILED = 'failed';
    case COMPLETED = 'completed';
    case EXPIRED = 'expired';
}
