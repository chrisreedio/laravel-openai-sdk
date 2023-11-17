<?php

namespace ChrisReedIO\OpenAI\SDK\Data;

use JsonException;
use Saloon\Http\Response;

class ErrorObject extends BaseObject
{
    public function __construct(
        public string $message,
        public string $type,
        public string $param,
        public string $code,
    ) {
    }

    public static function fromArray(array $item): self
    {
        return new self(
            message: $item['message'],
            type: $item['type'],
            param: $item['param'],
            code: $item['code'],
        );
    }

    /**
     * @throws JsonException
     */
    public static function fromResponse(Response $response): self
    {
        $data = (array) $response->json();

        return new self(
            message: $data['message'],
            type: $data['type'],
            param: $data['param'],
            code: $data['code'],
        );
    }
}
