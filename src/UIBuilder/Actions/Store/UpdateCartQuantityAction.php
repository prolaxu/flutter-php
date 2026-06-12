<?php

namespace FlutterPHP\UIBuilder\Actions\Store;

class UpdateCartQuantityAction extends StoreAction
{
    public function __construct(
        string $store,
        public int|string $index,
        public int $quantity,
    ) {
        parent::__construct($store);
    }

    public function type(): string
    {
        return 'updateCartQuantity';
    }

    protected function payload(): array
    {
        return [
            'index' => $this->index,
            'quantity' => $this->quantity,
        ];
    }
}
