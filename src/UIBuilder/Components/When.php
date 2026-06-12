<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\State\StateRef;
use FlutterPHP\UIBuilder\State\StoreRef;

class When extends UIComponent
{
    public function __construct(
        public StoreRef|StateRef|string $watch,
        public mixed $equals,
        public UIComponent $child,
        public ?UIComponent $else = null,
    ) {}

    protected function type(): string
    {
        return 'When';
    }

    protected function props(): array
    {
        return array_filter([
            'watch' => $this->watch instanceof StoreRef || $this->watch instanceof StateRef
                ? (string) $this->watch
                : $this->watch,
            'equals' => $this->equals,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        $children = [$this->child];
        if ($this->else) {
            $children[] = $this->else;
        }

        return $children;
    }
}
