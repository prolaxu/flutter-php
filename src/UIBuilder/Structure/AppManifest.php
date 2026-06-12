<?php

namespace FlutterPHP\UIBuilder\Structure;

class AppManifest
{
    public function __construct(
        public Router $router,
        public ?AppTheme $theme = null,
        public ?AppEnvironment $environment = null,
        public ?AppCapabilities $capabilities = null,
        public ?BroadcastingConfig $broadcasting = null,
        public string $version = '1.0',
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'version' => $this->version,
            'environment' => $this->environment?->toArray(),
            'capabilities' => $this->capabilities?->toArray(),
            'broadcasting' => $this->broadcasting?->toArray(),
            'theme' => $this->theme?->toArray(),
            'router' => $this->router->toArray(),
        ], fn ($value) => $value !== null);
    }

    public function toJson(bool $pretty = true): string
    {
        return json_encode($this->toArray(), $pretty ? JSON_PRETTY_PRINT : 0);
    }
}
