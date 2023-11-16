<?php

namespace ChrisReedIO\OpenAI\SDK\Commands;

use Illuminate\Console\Command;

class OpenAiClientCommand extends Command
{
    public $signature = 'laravel-openai-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
