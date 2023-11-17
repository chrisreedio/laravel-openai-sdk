<?php

namespace ChrisReedIO\OpenAI\SDK\Data;

use ChrisReedIO\OpenAI\SDK\Enums\RunStatus;

class RunObject extends BaseObject
{
    public function __construct(
        public string $id,
        public string $object, // Should always be 'thread.run'
        public int $created_at,
        public string $thread_id,
        public string $assistant_id,
        public RunStatus $status, // Should make an enum here
        public int $started_at,
        public ?int $expires_at,
        public ?int $cancelled_at,
        public ?int $failed_at,
        public ?int $completed_at,
        public ?string $last_error,
        public string $model,
        public ?string $instructions,
        public array $tools,
        public array $file_ids,
        public array $metadata
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            object: $data['object'],
            created_at: $data['created_at'],
            thread_id: $data['thread_id'],
            assistant_id: $data['assistant_id'],
            status: RunStatus::tryFrom($data['status']),
            started_at: $data['started_at'],
            expires_at: $data['expires_at'] ?? null,
            cancelled_at: $data['cancelled_at'] ?? null,
            failed_at: $data['failed_at'] ?? null,
            completed_at: $data['completed_at'] ?? null,
            last_error: $data['last_error'] ?? null,
            model: $data['model'],
            instructions: $data['instructions'] ?? null,
            tools: $data['tools'],
            file_ids: $data['file_ids'] ?? [],
            metadata: $data['metadata'] ?? []
        );
    }
}
