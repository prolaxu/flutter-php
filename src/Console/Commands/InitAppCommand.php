<?php

namespace FlutterPHP\Console\Commands;

use Illuminate\Console\Command;

class InitAppCommand extends Command
{
    protected $signature = 'flutter-php:init-app {name? : App name for titles}';

    protected $description = 'Scaffold a new MobileUI app with screens, components, stores and theme';

    public function handle(): int
    {
        $appName = $this->argument('name') ?? 'MyApp';

        $this->info("Scaffolding MobileUI app: {$appName}");

        $this->ensureDirectory(app_path('MobileUI'));
        $this->ensureDirectory(app_path('MobileUI/Screens'));
        $this->ensureDirectory(app_path('MobileUI/Components'));
        $this->ensureDirectory(app_path('MobileUI/Stores'));
        $this->ensureDirectory(app_path('MobileUI/Theme'));

        $stubPath = __DIR__.'/../../../stubs/init';

        $this->copyStub("{$stubPath}/app-structure.stub", app_path('MobileUI/AppStructure.php'));
        $this->copyStub("{$stubPath}/app-theme.stub", app_path('MobileUI/Theme/AppTheme.php'));
        $this->copyStub("{$stubPath}/home.stub", app_path('MobileUI/Screens/HomeScreen.php'), ['{{ appName }}' => $appName]);
        $this->copyStub("{$stubPath}/login.stub", app_path('MobileUI/Screens/LoginScreen.php'));
        $this->copyStub("{$stubPath}/register.stub", app_path('MobileUI/Screens/RegisterScreen.php'));
        $this->copyStub("{$stubPath}/profile.stub", app_path('MobileUI/Screens/ProfileScreen.php'));
        $this->copyStub("{$stubPath}/auth-store.stub", app_path('MobileUI/Stores/AuthStore.php'));
        $this->copyStub("{$stubPath}/user-store.stub", app_path('MobileUI/Stores/UserStore.php'));

        $this->ensureDirectory(public_path());
        $this->call('flutter-php:generate-structure');

        $this->newLine();
        $this->info("✓ App '{$appName}' scaffolded successfully.");
        $this->comment('  Next: register routes in AppStructure.php → manifest()');
        $this->comment('  Run:  php artisan serve');
        $this->comment('  Load: http://localhost:8000/api/app-structure');

        return 0;
    }

    private function copyStub(string $stubPath, string $targetPath, array $replace = []): void
    {
        if (file_exists($targetPath)) {
            $this->line('  <fg=yellow>⊙</> skipped: '.basename($targetPath));

            return;
        }

        $content = file_get_contents($stubPath);
        foreach ($replace as $key => $value) {
            $content = str_replace($key, $value, $content);
        }

        file_put_contents($targetPath, $content);
        $this->line('  <fg=green>✓</> '.basename($targetPath));
    }

    private function ensureDirectory(string $dir): void
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}
