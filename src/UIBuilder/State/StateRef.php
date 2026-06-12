<?php

namespace FlutterPHP\UIBuilder\State;

class StateRef
{
    public function __construct(public string $key) {}

    public function __toString(): string
    {
        return "{{state.{$this->key}}}";
    }
}
