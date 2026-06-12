<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Actions\Action;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\IconName;
use FlutterPHP\UIBuilder\Primitives\Text;

class DynamicButton extends UIComponent
{
    public function __construct(
        public Text $label,
        public ?Action $action = null,
        public string $style = 'elevated',
        public ?IconName $icon = null,
        public bool $disabled = false,
    ) {}

    protected function type(): string
    {
        return 'DynamicButton';
    }

    protected function props(): array
    {
        return array_filter([
            'label' => $this->label->toArray(),
            'action' => $this->action?->toArray(),
            'style' => $this->style,
            'icon' => $this->icon?->toArray(),
            'disabled' => $this->disabled ? true : null,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return [];
    }
}
