<?php

namespace FlutterPHP\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeStoreCommand extends Command
{
    protected $signature = 'flutter-php:make-store {name}';

    protected $description = 'Create a new MobileUI store class';

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $storeKey = Str::camel($name);
        $path = app_path("MobileUI/Stores/{$name}.php");

        if (file_exists($path)) {
            $this->error("Store already exists: {$path}");

            return 1;
        }

        $this->ensureDirectory(dirname($path));
        $this->makeFromStub('store', $path, $name, $storeKey);
        $this->info("Store created: {$path}");
        $this->comment("Store key: '{$storeKey}' — use StoreRef('{$storeKey}', 'field') to bind");

        return 0;
    }

    private function makeFromStub(string $stub, string $path, string $name, string $storeKey): void
    {
        $stubPath = __DIR__."/../../../stubs/{$stub}.stub";
        $content = file_get_contents($stubPath);
        $content = str_replace(
            ['{{ namespace }}', '{{ class }}', '{{ storeKey }}'],
            ['App\MobileUI\Stores', $name, $storeKey],
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
