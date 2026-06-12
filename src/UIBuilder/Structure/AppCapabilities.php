<?php

namespace FlutterPHP\UIBuilder\Structure;

class AppCapabilities
{
    public function __construct(
        public array $native = [],
    ) {}

    public function toArray(): array
    {
        return [
            'native' => $this->native,
        ];
    }

    public static function standard(): self
    {
        return new self(native: [
            'notification',
            'camera',
            'pusher',
            'socket',
            'storage',
            'share',
            'geolocation',
        ]);
    }
}
