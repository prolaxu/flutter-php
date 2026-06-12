<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class StoreList extends UIComponent
{
    public function __construct(
        public string $storeKey,
        public array $itemMapping,
        public string $itemType = 'DynamicCard',
        public string $layout = 'list',
        public string $emptyMessage = '',
    ) {}

    protected function type(): string
    {
        return 'StoreList';
    }

    protected function props(): array
    {
        return [
            'storeKey' => $this->storeKey,
            'itemMapping' => $this->itemMapping,
            'itemType' => $this->itemType,
            'layout' => $this->layout,
            'emptyMessage' => $this->emptyMessage,
        ];
    }

    protected function children(): array
    {
        return [];
    }
}
