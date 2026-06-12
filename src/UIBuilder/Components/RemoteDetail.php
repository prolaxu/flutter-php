<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class RemoteDetail extends UIComponent
{
    /** @param UIComponent[] $children */
    public function __construct(
        public string $dataSource,
        public string $method = 'GET',
        public ?string $dataPath = null,
        public ?string $errorMessage = 'Unable to load item.',
        public array $children = [],
    ) {}

    protected function type(): string
    {
        return 'RemoteDetail';
    }

    protected function props(): array
    {
        return array_filter([
            'dataSource' => $this->dataSource,
            'method' => $this->method,
            'dataPath' => $this->dataPath,
            'errorMessage' => $this->errorMessage,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return $this->children;
    }
}
