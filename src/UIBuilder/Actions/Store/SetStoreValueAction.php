<?php

namespace FlutterPHP\UIBuilder\Actions\Store;

use FlutterPHP\UIBuilder\Actions\Action;

class SetStoreValueAction extends StoreAction
{
    public function __construct(
        string $store,
        public string $field,
        public mixed $value,
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct($store, onSuccess: $onSuccess, onError: $onError);
    }

    public function type(): string
    {
        return 'setStoreValue';
    }

    protected function payload(): array
    {
        return [
            'field' => $this->field,
            'value' => $this->value,
        ];
    }
}
