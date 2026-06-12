<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Actions\Action;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\IconName;
use FlutterPHP\UIBuilder\Primitives\ImageUrl;
use FlutterPHP\UIBuilder\Primitives\Text;

class DynamicCard extends UIComponent
{
    public function __construct(
        public ?Text $title = null,
        public ?Text $subtitle = null,
        public ?ImageUrl $image = null,
        public ?IconName $icon = null,
        public ?Action $onTap = null,
        public ?UIComponent $child = null,
    ) {}

    protected function type(): string
    {
        return 'DynamicCard';
    }

    protected function props(): array
    {
        return array_filter([
            'title' => $this->title?->toArray(),
            'subtitle' => $this->subtitle?->toArray(),
            'image' => $this->image?->url,
            'icon' => $this->icon?->toArray(),
            'onTap' => $this->onTap?->toArray(),
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return $this->child ? [$this->child] : [];
    }
}
