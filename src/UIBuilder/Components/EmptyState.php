<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class EmptyState extends UIComponent
{
    public function __construct(
        public string $message = 'Nothing here.',
        public ?string $icon = null,
        public ?string $subtitle = null,
    ) {}

    protected function type(): string
    {
        return 'EmptyState';
    }

    protected function props(): array
    {
        return array_filter([
            'message' => $this->message,
            'icon' => $this->icon,
            'subtitle' => $this->subtitle,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return [];
    }
}
