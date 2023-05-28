<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name}';

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
        $path = resource_path('views/Pages/' . $name . '.blade.php');

        if (File::exists($path)) {
            $this->error('View already exists!');
            return 0;
        }

        $stubFolder = 'views'; // Nama folder yang berisi file .stub
        $stubPath = resource_path('stubs/' . $stubFolder . '/' . $name . '.stub');

        if (!File::exists($stubPath)) {
            $this->error('Stub file not found!');
            return 0;
        }

        $stub = File::get($stubPath);

        // Tambahkan logika kustomisasi konten di sini sesuai kebutuhan Anda

        File::put($path, $stub);

        $this->info('View created successfully: ' . $path);
        return 0;
    }
}
