<?php

namespace ChrisReedIO\OpenAI\SDK\Data;

class AssistantObject extends BaseObject
{
    public function __construct(
        public string $id,
        public string $object,
        public int $created_at,
        public string $name,
        public ?string $description,
        public string $model,
        public string $instructions,
        public array $tools,
        public array $file_ids,
        public array $metadata,
    ) {
    }

    public static function fromArray(array $item): self
    {
        // dd($item);
        return new self(
            id: $item['id'],
            object: $item['object'],
            created_at: $item['created_at'],
            name: $item['name'],
            description: $item['description'],
            model: $item['model'],
            instructions: $item['instructions'],
            tools: $item['tools'],
            file_ids: $item['file_ids'],
            metadata: $item['metadata'],
        );
    }
}
