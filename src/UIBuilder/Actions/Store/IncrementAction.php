<?php

namespace FlutterPHP\UIBuilder\Actions\Store;

class IncrementAction extends StoreAction
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
        return 'increment';
    }

    protected function payload(): array
    {
        return [
            'field' => $this->field,
            'amount' => $this->amount,
        ];
    }
}
