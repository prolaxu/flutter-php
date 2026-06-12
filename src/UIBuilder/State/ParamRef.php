<?php

namespace FlutterPHP\UIBuilder\State;

class ParamRef
{
    public function __construct(public string $key) {}

    public function __toString(): string
    {
        return "{{params.{$this->key}}}";
    }
}
