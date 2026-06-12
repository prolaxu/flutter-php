<?php

namespace FlutterPHP\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeScreenCommand extends Command
{
    protected $signature = 'flutter-php:make-screen {name}';

    protected $description = 'Create a new MobileUI screen class';

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $path = app_path("MobileUI/Screens/{$name}.php");

        if (file_exists($path)) {
            $this->error("Screen already exists: {$path}");

            return 1;
        }

        $this->ensureDirectory(dirname($path));
        $this->makeFromStub('screen', $path, $name);
        $this->info("Screen created: {$path}");
        $this->comment('Register it in AppStructure.php → manifest()');

        return 0;
    }

    private function replaceFor(string $name): array
    {
        return [
            '{{ namespace }}' => 'App\MobileUI\Screens',
            '{{ class }}' => $name,
            '{{ title }}' => Str::headline($name),
        ];
    }

    private function makeFromStub(string $stub, string $path, string $name): void
    {
        $stubPath = __DIR__."/../../../stubs/{$stub}.stub";
        $content = file_get_contents($stubPath);
        foreach ($this->replaceFor($name) as $key => $value) {
            $content = str_replace($key, $value, $content);
        }
        file_put_contents($path, $content);
    }

    private function ensureDirectory(string $dir): void
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}
