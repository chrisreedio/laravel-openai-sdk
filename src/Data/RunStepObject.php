<?php

namespace ChrisReedIO\OpenAI\SDK\Data;

use ChrisReedIO\OpenAI\SDK\Enums\RunStepStatus;
use ChrisReedIO\OpenAI\SDK\Enums\RunStepType;

class RunStepObject
{
    public function __construct(
        public string        $id,
        public string        $object, // Should always be 'thread.run.step'
        public int           $created_at,
        public string        $assistant_id,
        public string        $thread_id,
        public string        $run_id,
        public RunStepType   $type,
        public RunStepStatus $status,
        public array         $step_details,
        public ?string       $last_error,
        public ?int          $expired_at,
        public ?int          $cancelled_at,
        public ?int          $failed_at,
        public int           $completed_at,
        public array         $metadata
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            object: $data['object'],
            created_at: $data['created_at'],
            assistant_id: $data['assistant_id'],
            thread_id: $data['thread_id'],
            run_id: $data['run_id'],
            type: RunStepType::tryFrom($data['type']),
            status: RunStepStatus::tryFrom($data['status']),
            step_details: $data['step_details'],
            last_error: $data['last_error'] ?? null,
            expired_at: $data['expired_at'] ?? null,
            cancelled_at: $data['cancelled_at'] ?? null,
            failed_at: $data['failed_at'] ?? null,
            completed_at: $data['completed_at'],
            metadata: $data['metadata'] ?? []
        );
    }
}
