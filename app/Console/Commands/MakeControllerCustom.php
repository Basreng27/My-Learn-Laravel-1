<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeControllerCustom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:controllerCustom {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $className = Str::studly($name);
        $filename = app_path('Http/Controllers/' . $className . '.php');
        $module = str_replace('Controller', '', $name);

        if (file_exists($filename)) {
            $this->error('Controller already exists!');
            return;
        }

        $stub = file_get_contents(__DIR__ . '/stubs/Controller.stub');
        $stub = str_replace('{{ class }}', $className, $stub);
        $stub = str_replace('{{ module }}', $module, $stub);

        file_put_contents($filename, $stub);

        $this->info('Controller created successfully!');
    }
}
