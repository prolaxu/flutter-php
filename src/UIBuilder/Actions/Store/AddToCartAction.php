<?php

namespace FlutterPHP\UIBuilder\Actions\Store;

use FlutterPHP\UIBuilder\Actions\Action;

class AddToCartAction extends StoreAction
{
    public function __construct(
        string $store,
        public array $item,
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct($store, $onSuccess, $onError);
    }

    public function type(): string
    {
        return 'addToCart';
    }

    protected function payload(): array
    {
        return [
            'item' => $this->item,
        ];
    }
}
