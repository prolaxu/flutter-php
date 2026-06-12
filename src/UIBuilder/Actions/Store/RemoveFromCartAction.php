<?php

namespace FlutterPHP\UIBuilder\Actions\Store;

class RemoveFromCartAction extends StoreAction
{
    public function __construct(
        string $store,
        public int|string $index,
    ) {
        parent::__construct($store);
    }

    public function type(): string
    {
        return 'removeFromCart';
    }

    protected function payload(): array
    {
        return [
            'index' => $this->index,
        ];
    }
}
