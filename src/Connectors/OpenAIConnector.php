<?php

namespace ChrisReedIO\OpenAI\SDK\Connectors;

use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\CursorPaginator;
use Saloon\PaginationPlugin\Paginator;

/**
 * OpenAI API
 *
 * The OpenAI REST API. Please see https://platform.openai.com/docs/api-reference for more details.
 */
class OpenAIConnector extends Connector implements HasPagination
{
    public function resolveBaseUrl(): string
    {
        return 'https://api.openai.com/v1';
    }

    public function __construct()
    {
        $this->withTokenAuth(config('openai-sdk.api_key'));
    }

    protected function defaultHeaders(): array
    {
        return [
            'OpenAI-Beta' => 'assistants=v1',
        ];
    }

    public function paginate(Request $request): Paginator
    {
        return new class(connector: $this, request: $request) extends CursorPaginator
        {
            protected ?int $perPageLimit = 100;

            protected function getNextCursor(Response $response): int|string
            {
                return $response->json('last_id');
            }

            protected function isLastPage(Response $response): bool
            {
                return $response->json('has_more') === true;
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json('data');
            }

            protected function applyPagination(Request $request): Request
            {
                if ($this->currentResponse instanceof Response) {
                    $request->query()->add('after', $this->getNextCursor($this->currentResponse));
                }

                if (isset($this->perPageLimit)) {
                    $request->query()->add('limit', $this->perPageLimit);
                }

                return $request;
            }
        };
    }

    // public function assistants(): Assistants
    // {
    //     return new Assistants($this);
    // }
    //
    // public function models(): Models
    // {
    //     return new Models($this);
    // }
    // public function audio(): Audio
    // {
    //     return new Audio($this);
    // }
    //
    //
    // public function chat(): Chat
    // {
    //     return new Chat($this);
    // }
    //
    //
    // public function completions(): Completions
    // {
    //     return new Completions($this);
    // }
    //
    //
    // public function edits(): Edits
    // {
    //     return new Edits($this);
    // }
    //
    //
    // public function embeddings(): Embeddings
    // {
    //     return new Embeddings($this);
    // }
    //
    //
    // public function files(): Files
    // {
    //     return new Files($this);
    // }
    //
    //
    // public function fineTunes(): FineTunes
    // {
    //     return new FineTunes($this);
    // }
    //
    //
    // public function fineTuning(): FineTuning
    // {
    //     return new FineTuning($this);
    // }
    //
    //
    // public function images(): Images
    // {
    //     return new Images($this);
    // }
    //
    //
    //
    //
    // public function moderations(): Moderations
    // {
    //     return new Moderations($this);
    // }
}
