<?php

namespace ChrisReedIO\OpenAI\SDK\Data;

class ModelObject
{
    public function __construct(
        public string $id,
        public string $object,
        public int $created,
        public string $owned_by,
    ) {
    }

    public static function fromArray(array $item): self
    {
        return new self(
            id: $item['id'],
            object: $item['object'],
            created: $item['created'],
            owned_by: $item['owned_by'],
        );
    }
}
