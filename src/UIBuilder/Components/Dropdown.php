<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\State\StateRef;
use FlutterPHP\UIBuilder\State\StoreRef;

class Dropdown extends UIComponent
{
    public function __construct(
        public ?Text $label = null,
        public array $options = [],
        public StateRef|StoreRef|null $stateRef = null,
        public mixed $initialValue = null,
    ) {}

    protected function type(): string
    {
        return 'Dropdown';
    }

    protected function props(): array
    {
        return array_filter([
            'label' => (string) $this->label,
            'options' => $this->options,
            'stateKey' => (string) $this->stateRef,
            'initialValue' => $this->initialValue,
        ]);
    }

    protected function children(): array
    {
        return [];
    }
}
