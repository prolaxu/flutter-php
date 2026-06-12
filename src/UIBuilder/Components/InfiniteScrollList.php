<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class InfiniteScrollList extends UIComponent
{
    public function __construct(
        public string $dataSource,
        public string $itemType = 'DynamicCard',
        public ?array $itemMapping = null,
        public ?array $watchStoreKeys = null,
        public ?string $emptyMessage = null,
    ) {}

    protected function type(): string
    {
        return 'InfiniteScrollList';
    }

    protected function props(): array
    {
        return array_filter([
            'dataSource' => $this->dataSource,
            'itemType' => $this->itemType,
            'itemMapping' => $this->itemMapping,
            'watchStoreKeys' => $this->watchStoreKeys,
            'emptyMessage' => $this->emptyMessage,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return [];
    }
}
