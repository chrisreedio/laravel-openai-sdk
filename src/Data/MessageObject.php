<?php

namespace ChrisReedIO\OpenAI\SDK\Data;

class MessageObject
{
    public function __construct(
        public string $id,
        public string $object, // Should always be 'thread.message'
        public int $created_at,
        public string $thread_id,
        public string $role,
        public array $content,
        public ?string $assistant_id,
        public ?string $run_id,
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
            role: $data['role'],
            content: $data['content'],
            assistant_id: $data['assistant_id'] ?? null,
            run_id: $data['run_id'] ?? null,
            file_ids: $data['file_ids'] ?? [],
            metadata: $data['metadata']
        );
    }
}
