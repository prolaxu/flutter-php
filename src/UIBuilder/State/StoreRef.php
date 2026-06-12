<?php

namespace FlutterPHP\UIBuilder\State;

class StoreRef
{
    public function __construct(
        public string $store,
        public string $property,
    ) {}

    public function __toString(): string
    {
        return "{{store.{$this->store}.{$this->property}}}";
    }
}
