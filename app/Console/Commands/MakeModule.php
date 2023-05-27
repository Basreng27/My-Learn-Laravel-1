<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {moduleName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Module Controller, Model, Service, View';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modulName = $this->argument('moduleName');

        Artisan::call('make:controller', [
            'name' => $modulName . 'Controller'
        ]);

        Artisan::call('make:model', [
            'name' => $modulName
        ]);

        Artisan::call('make:service', [
            'name' => $modulName . 'Service'
        ]);

        Artisan::call('make:view', [
            'name' => $modulName
        ]);

        $this->info('Module Created');
    }
}
