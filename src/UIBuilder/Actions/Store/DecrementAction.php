<?php

namespace FlutterPHP\UIBuilder\Actions\Store;

class DecrementAction extends StoreAction
{
    public function __construct(
        string $store,
        public string $field,
        public int $amount = 1,
    ) {
        parent::__construct($store);
    }

    public function type(): string
    {
        return 'decrement';
    }

    protected function payload(): array
    {
        return [
            'field' => $this->field,
            'amount' => $this->amount,
        ];
    }
}
