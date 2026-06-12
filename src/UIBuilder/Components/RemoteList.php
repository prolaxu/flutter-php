<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Actions\Action;
use FlutterPHP\UIBuilder\Base\UIComponent;

class RemoteList extends UIComponent
{
    /**
     * @param  ?UIComponent  $item  Template rendered for each list item (replaces default card). Receives item bindings.
     */
    public function __construct(
        public string $dataSource,
        public string $method = 'GET',
        public string $itemsPath = 'data',
        public string $layout = 'grid',
        public int $crossAxisCount = 2,
        public ?array $itemMapping = null,
        public ?array $watchStoreKeys = null,
        public ?string $emptyMessage = 'Nothing here.',
        public ?string $itemType = 'DynamicCard',
        public ?float $childAspectRatio = null,
        public ?Action $onRemoveAction = null,
        public ?UIComponent $item = null,
    ) {}

    protected function type(): string
    {
        return 'RemoteList';
    }

    protected function props(): array
    {
        $props = array_filter([
            'dataSource' => $this->dataSource,
            'method' => $this->method,
            'itemsPath' => $this->itemsPath,
            'layout' => $this->layout,
            'crossAxisCount' => $this->crossAxisCount,
            'itemMapping' => $this->itemMapping,
            'watchStoreKeys' => $this->watchStoreKeys,
            'emptyMessage' => $this->emptyMessage,
            'itemType' => $this->itemType,
            'childAspectRatio' => $this->childAspectRatio,
        ], fn ($value) => $value !== null);

        if ($this->onRemoveAction !== null) {
            $props['onRemoveAction'] = $this->onRemoveAction->toArray();
        }

        return $props;
    }

    protected function children(): array
    {
        return $this->item !== null ? [$this->item] : [];
    }
}
