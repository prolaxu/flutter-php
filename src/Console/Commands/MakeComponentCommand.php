<?php

namespace FlutterPHP\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeComponentCommand extends Command
{
    protected $signature = 'flutter-php:make-component {name}';

    protected $description = 'Create a new MobileUI component class';

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $path = app_path("MobileUI/Components/{$name}.php");

        if (file_exists($path)) {
            $this->error("Component already exists: {$path}");

            return 1;
        }

        $this->ensureDirectory(dirname($path));
        $this->makeFromStub('component', $path, $name);
        $this->info("Component created: {$path}");

        return 0;
    }

    private function makeFromStub(string $stub, string $path, string $name): void
    {
        $stubPath = __DIR__."/../../../stubs/{$stub}.stub";
        $content = file_get_contents($stubPath);
        $content = str_replace(
            ['{{ namespace }}', '{{ class }}'],
            ['App\MobileUI\Components', $name],
            $content,
        );
        file_put_contents($path, $content);
    }

    private function ensureDirectory(string $dir): void
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}
