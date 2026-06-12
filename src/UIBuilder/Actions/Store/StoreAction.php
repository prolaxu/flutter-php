<?php

namespace FlutterPHP\UIBuilder\Actions\Store;

use FlutterPHP\UIBuilder\Actions\Action;

abstract class StoreAction implements Action
{
    public function __construct(
        public string $store,
        public ?Action $onSuccess = null,
        public ?Action $onError = null,
    ) {}

    abstract public function type(): string;

    abstract protected function payload(): array;

    public function toArray(): array
    {
        return array_filter([
            'type' => $this->type(),
            'store' => $this->store,
            ...$this->payload(),
            'onSuccess' => $this->onSuccess?->toArray(),
            'onError' => $this->onError?->toArray(),
        ], fn ($value) => $value !== null);
    }
}
