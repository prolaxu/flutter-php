<?php

namespace FlutterPHP\UIBuilder\Actions;

class NavigateAfterAuthAction implements Action
{
    public function __construct(
        public string $fallbackRoute = '/profile',
    ) {}

    public function toArray(): array
    {
        return [
            'type' => 'navigateAfterAuth',
            'fallbackRoute' => $this->fallbackRoute,
        ];
    }
}
