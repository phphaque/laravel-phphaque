<?php

namespace Phphaque\LaravelPhphaque\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'phphaque:install';
    protected $description = 'Install the Phphaque package';

    public function handle()
    {
        $this->info('Installing Phphaque package...');
        
        // Publish assets
        $this->call('vendor:publish', [
            '--provider' => 'Phphaque\LaravelPhphaque\PhphaqueServiceProvider',
            '--tag' => 'phphaque'
        ]);

        $this->info('Phphaque installed successfully!');
    }
}