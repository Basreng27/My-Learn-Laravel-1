<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeModelCustom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:modelCustom {name}';

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
        $filename = app_path('Models/' . $className . '.php');

        if (file_exists($filename)) {
            $this->error('Model already exists!');
            return;
        }

        $stub = file_get_contents(__DIR__ . '/stubs/Model.stub');
        $stub = str_replace('{{ class }}', $className, $stub);

        file_put_contents($filename, $stub);

        $this->info('Model created successfully!');
    }
}
