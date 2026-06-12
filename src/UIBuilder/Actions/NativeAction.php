<?php

namespace FlutterPHP\UIBuilder\Actions;

class NativeAction implements Action
{
    public function __construct(
        public string $plugin,
        public string $method,
        public array $params = [],
        public ?string $resultStoreKey = null,
        public ?Action $onSuccess = null,
        public ?Action $onError = null,
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'type' => 'native',
            'plugin' => $this->plugin,
            'method' => $this->method,
            'params' => $this->params,
            'resultStoreKey' => $this->resultStoreKey,
            'onSuccess' => $this->onSuccess?->toArray(),
            'onError' => $this->onError?->toArray(),
        ], fn ($value) => $value !== null);
    }
}
