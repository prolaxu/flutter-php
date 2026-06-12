<?php

namespace FlutterPHP\UIBuilder\Actions\Store;

use FlutterPHP\UIBuilder\Actions\Action;

class ClearStoreAction extends StoreAction
{
    public function __construct(
        string $store,
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct($store, $onSuccess, $onError);
    }

    public function type(): string
    {
        return 'clearStore';
    }

    protected function payload(): array
    {
        return [];
    }
}
