<?php

namespace ChrisReedIO\OpenAI\SDK\Data;

class ThreadObject
{
    public function __construct(
        public string $id,
        public string $object, // Should always be 'thread'
        public int $created_at,
        public array $metadata,
    )
    {

    }

    public static function fromArray(array $item): self
    {
        return new self(
            id: $item['id'],
            object: $item['object'],
            created_at: $item['created_at'],
            metadata: $item['metadata'],
        );
    }
}
