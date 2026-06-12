<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class Loader extends UIComponent
{
    protected function type(): string
    {
        return 'Loader';
    }

    protected function props(): array
    {
        return [];
    }

    protected function children(): array
    {
        return [];
    }
}
