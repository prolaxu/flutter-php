<?php

namespace FlutterPHP\UIBuilder\Structure;

/**
 * Pusher-protocol client settings for Laravel Reverb or Pusher Cloud.
 * Safe to expose in the manifest (never include app secret).
 */
class BroadcastingConfig
{
    public function __construct(
        public string $driver = 'reverb',
        public string $key = '',
        public string $cluster = 'mt1',
        public string $host = 'localhost',
        public int $port = 8080,
        public string $scheme = 'http',
        public ?string $authEndpoint = null,
        public bool $enabled = false,
    ) {}

    public function toArray(): array
    {
        if (! $this->enabled || $this->key === '') {
            return ['enabled' => false];
        }

        return [
            'enabled' => true,
            'driver' => $this->driver,
            'key' => $this->key,
            'cluster' => $this->cluster,
            'host' => $this->host,
            'port' => $this->port,
            'scheme' => $this->scheme,
            'useTLS' => $this->scheme === 'https',
            'authEndpoint' => $this->authEndpoint,
        ];
    }

    public static function fromConfig(array $config, string $apiBaseUrl): self
    {
        $driver = $config['driver'] ?? 'reverb';
        $enabled = filter_var($config['enabled'] ?? false, FILTER_VALIDATE_BOOL);

        return new self(
            driver: $driver,
            key: $config['key'] ?? '',
            cluster: $config['cluster'] ?? 'mt1',
            host: $config['host'] ?? 'localhost',
            port: (int) ($config['port'] ?? 8080),
            scheme: $config['scheme'] ?? 'http',
            authEndpoint: rtrim($apiBaseUrl, '/').'/broadcasting/auth',
            enabled: $enabled,
        );
    }
}
