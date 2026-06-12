<?php

namespace FlutterPHP\UIBuilder\Structure;

class AppEnvironment
{
    public function __construct(
        public string $name = 'local',
        public string $apiBaseUrl = 'http://localhost:8000/api',
        public bool $showDebugBanner = false,
        public string $guestRedirectRoute = '/login',
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'apiBaseUrl' => $this->apiBaseUrl,
            'showDebugBanner' => $this->showDebugBanner,
            'guestRedirectRoute' => $this->guestRedirectRoute,
        ];
    }
}
