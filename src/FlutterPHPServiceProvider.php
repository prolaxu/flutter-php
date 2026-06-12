<?php

namespace FlutterPHP;

use FlutterPHP\Console\Commands\GenerateStructureCommand;
use FlutterPHP\Console\Commands\InitAppCommand;
use FlutterPHP\Console\Commands\MakeComponentCommand;
use FlutterPHP\Console\Commands\MakeScreenCommand;
use FlutterPHP\Console\Commands\MakeStoreCommand;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FlutterPHPServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/flutter-php.php', 'flutter-php');

        $this->commands([
            GenerateStructureCommand::class,
            InitAppCommand::class,
            MakeScreenCommand::class,
            MakeComponentCommand::class,
            MakeStoreCommand::class,
        ]);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/flutter-php.php' => config_path('flutter-php.php'),
        ], 'flutter-php-config');

        Route::prefix(config('flutter-php.route_prefix', 'api'))
            ->group(function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
            });
    }
}
