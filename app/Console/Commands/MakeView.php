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
        $folderPath = resource_path('views/Pages/' . $name);

        if (File::exists($folderPath)) {
            $this->error('View folder already exists!');
            return 0;
        }

        File::makeDirectory($folderPath);

        $stubFolder = 'views'; // Nama folder yang berisi file .stub

        $stubFiles = ['index.stub', 'form.stub']; // Daftar file .stub yang ingin Anda gunakan

        $stubsPath = base_path('app/Console/Commands/stubs/' . $stubFolder); // Path ke folder yang berisi file .stub

        foreach ($stubFiles as $stubFile) {
            $stubPath = $stubsPath . '/' . $stubFile;
            $destinationPath = $folderPath . '/' . str_replace('.stub', '.blade.php', $stubFile);

            if (!File::exists($stubPath)) {
                $this->error('Stub file not found: ' . $stubPath);
                continue;
            }

            $stub = File::get($stubPath);

            // Tambahkan logika kustomisasi konten di sini sesuai kebutuhan Anda

            File::put($destinationPath, $stub);

            $this->info('View created successfully: ' . $destinationPath);
        }

        return 0;
    }
}
