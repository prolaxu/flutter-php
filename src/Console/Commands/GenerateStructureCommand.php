<?php

namespace FlutterPHP\Console\Commands;

use App\MobileUI\AppStructure;
use Illuminate\Console\Command;

class GenerateStructureCommand extends Command
{
    protected $signature = 'flutter-php:generate-structure';

    protected $description = 'Generate app_structure.json from UI builders';

    public function handle()
    {
        $json = (new AppStructure)->toJson();
        $outputPath = config('flutter-php.output_path', public_path('app_structure.json'));

        file_put_contents($outputPath, $json);
        $this->info("app_structure.json generated at {$outputPath}.");
    }
}
