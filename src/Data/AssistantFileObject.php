<?php

namespace ChrisReedIO\OpenAI\SDK\Data;

class AssistantFileObject extends BaseObject
{
    public function __construct(
        public string $id,
        public string $object, // Should always be 'assistant.file'
        public int $created_at,
        public string $assistant_id
    ) {

    }

    public static function fromArray(array $item): self
    {
        return new self(
            id: $item['id'],
            object: $item['object'],
            created_at: $item['created_at'],
            assistant_id: $item['assistant_id'],
        );
    }
}
