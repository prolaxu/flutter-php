<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\Text;

class SectionHeader extends UIComponent
{
    public function __construct(
        public Text $title,
        public ?Text $actionLabel = null,
        public ?string $actionRoute = null,
    ) {}

    protected function type(): string
    {
        return 'SectionHeader';
    }

    protected function props(): array
    {
        return array_filter([
            'title' => $this->title->toArray(),
            'actionLabel' => $this->actionLabel?->toArray(),
            'actionRoute' => $this->actionRoute,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return [];
    }
}
