<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\Text;

class Scaffold extends UIComponent
{
    public function __construct(
        public ?Text $title = null,
        public ?UIComponent $body = null,
        public ?array $bottomNavItems = null,
        public bool $showAppBar = true,
        public bool $centerTitle = false,
        public bool $extendBodyBehindAppBar = false,
        public ?bool $showBackButton = null,
        public ?string $backRoute = null,
    ) {}

    protected function type(): string
    {
        return 'Scaffold';
    }

    protected function props(): array
    {
        return array_filter([
            'title' => (string) $this->title,
            'showAppBar' => $this->showAppBar,
            'centerTitle' => $this->centerTitle ?: null,
            'extendBodyBehindAppBar' => $this->extendBodyBehindAppBar ?: null,
            'showBackButton' => $this->showBackButton,
            'backRoute' => $this->backRoute,
            'bottomNav' => $this->bottomNavItems,
        ], fn ($v) => $v !== null);
    }

    protected function children(): array
    {
        return $this->body ? [$this->body] : [];
    }
}
