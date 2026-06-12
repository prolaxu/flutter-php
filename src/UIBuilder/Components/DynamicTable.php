<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class DynamicTable extends UIComponent
{
    public function __construct(
        public array $columns = [],
        public array $rows = [],
    ) {}

    protected function type(): string
    {
        return 'DynamicTable';
    }

    protected function props(): array
    {
        return ['columns' => $this->columns, 'rows' => $this->rows];
    }

    protected function children(): array
    {
        return [];
    }
}
