<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Actions\Action;
use FlutterPHP\UIBuilder\Base\UIComponent;

class DynamicForm extends UIComponent
{
    public function __construct(
        public array $fields = [],
        public ?Action $onSubmit = null,
        public ?string $submitLabel = 'Submit',
    ) {}

    protected function type(): string
    {
        return 'DynamicForm';
    }

    protected function props(): array
    {
        return array_filter([
            'submitLabel' => $this->submitLabel,
            'onSubmit' => $this->onSubmit?->toArray(),
        ]);
    }

    protected function children(): array
    {
        return $this->fields;
    }
}
