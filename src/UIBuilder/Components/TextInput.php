<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\State\StateRef;
use FlutterPHP\UIBuilder\State\StoreRef;

class TextInput extends UIComponent
{
    public function __construct(
        public ?Text $label = null,
        public ?Text $placeholder = null,
        public StateRef|StoreRef|null $stateRef = null,
        public mixed $initialValue = null,
        public bool $obscureText = false,
        public bool $required = false,
        public string $keyboardType = 'text',
    ) {}

    protected function type(): string
    {
        return 'TextInput';
    }

    protected function props(): array
    {
        return array_filter([
            'label' => (string) $this->label,
            'placeholder' => (string) $this->placeholder,
            'stateKey' => (string) $this->stateRef,
            'initialValue' => $this->initialValue,
            'obscureText' => $this->obscureText,
            'required' => $this->required,
            'keyboardType' => $this->keyboardType !== 'text' ? $this->keyboardType : null,
        ], fn ($v) => $v !== null);
    }

    protected function children(): array
    {
        return [];
    }
}
