<?php

namespace IvanAquino\LaravelTaildashboards\Commands;

use Illuminate\Console\Command;

class LaravelTaildashboardsCommand extends Command
{
    public $signature = 'laravel-taildashboards';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
