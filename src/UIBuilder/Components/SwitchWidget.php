<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\State\StateRef;
use FlutterPHP\UIBuilder\State\StoreRef;

class SwitchWidget extends UIComponent
{
    public function __construct(
        public StateRef|StoreRef $stateRef,
        public bool $initialValue = false,
    ) {}

    protected function type(): string
    {
        return 'Switch';
    }

    protected function props(): array
    {
        return [
            'stateKey' => (string) $this->stateRef,
            'initialValue' => $this->initialValue,
        ];
    }

    protected function children(): array
    {
        return [];
    }
}
