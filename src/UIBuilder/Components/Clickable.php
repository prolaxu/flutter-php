<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Actions\Action;
use FlutterPHP\UIBuilder\Base\UIComponent;

class Clickable extends UIComponent
{
    public function __construct(
        public Action $action,
        public UIComponent $child,
    ) {}

    protected function type(): string
    {
        return 'Clickable';
    }

    protected function props(): array
    {
        return [
            'action' => $this->action->toArray(),
        ];
    }

    protected function children(): array
    {
        return [$this->child];
    }
}
