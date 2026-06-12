<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class AuthGuard extends UIComponent
{
    public function __construct(
        public UIComponent $child,
        public ?UIComponent $fallback = null,
        public string $loginRoute = '/login',
        public string $registerRoute = '/register',
        public ?string $message = 'Please sign in to continue.',
    ) {}

    protected function type(): string
    {
        return 'AuthGuard';
    }

    protected function props(): array
    {
        return array_filter([
            'loginRoute' => $this->loginRoute,
            'registerRoute' => $this->registerRoute,
            'message' => $this->message,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return $this->fallback !== null
            ? [$this->child, $this->fallback]
            : [$this->child];
    }
}
