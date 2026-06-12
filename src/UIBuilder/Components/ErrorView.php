<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class ErrorView extends UIComponent
{
    public function __construct(public string $message = 'An error occurred.') {}

    protected function type(): string
    {
        return 'ErrorView';
    }

    protected function props(): array
    {
        return ['message' => $this->message];
    }

    protected function children(): array
    {
        return [];
    }
}
