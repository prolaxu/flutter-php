<?php

namespace FlutterPHP\UIBuilder\Actions;

class ApiCallAction implements Action
{
    public function __construct(
        public string $url,
        public string $method = 'GET',
        public ?array $body = null,
        public ?Action $onSuccess = null,
        public ?Action $onError = null,
        public ?string $resultStoreKey = null,
        public ?array $resultMap = null,
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'type' => 'apiCall',
            'url' => $this->url,
            'method' => $this->method,
            'body' => $this->body,
            'onSuccess' => $this->onSuccess?->toArray(),
            'onError' => $this->onError?->toArray(),
            'resultStoreKey' => $this->resultStoreKey,
            'resultMap' => $this->resultMap,
        ], fn ($v) => $v !== null);
    }
}
