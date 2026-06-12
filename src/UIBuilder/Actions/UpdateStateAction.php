<?php

namespace FlutterPHP\UIBuilder\Actions;

class UpdateStateAction implements Action
{
    public function __construct(
        public string $key,
        public mixed $value,
    ) {}

    public function toArray(): array
    {
        return [
            'type' => 'updateState',
            'key' => $this->key,
            'value' => $this->value,
        ];
    }
}
