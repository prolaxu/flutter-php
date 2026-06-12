<?php

namespace FlutterPHP\UIBuilder\State;

use FlutterPHP\UIBuilder\Actions\Store\StoreAction;

abstract class Store
{
    abstract public function name(): string;

    public function initialState(): array
    {
        return get_object_vars($this);
    }

    public function actions(): array
    {
        return [];
    }

    public function computed(): array
    {
        return [];
    }

    public function persist(): bool
    {
        return false;
    }

    final public function toArray(): array
    {
        $state = $this->initialState();
        unset($state['name']);

        $actions = array_map(
            fn (StoreAction $action) => $action->toArray(),
            $this->actions(),
        );

        $payload = [
            'state' => $state,
            'actions' => $actions,
        ];

        $computed = $this->computed();
        if ($computed !== []) {
            $payload['computed'] = $computed;
        }

        $persist = $this->persist();
        if ($persist) {
            $payload['persist'] = true;
        }

        return $payload;
    }
}
