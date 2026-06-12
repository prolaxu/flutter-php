<?php

namespace FlutterPHP\UIBuilder\Primitives;

class IconName
{
    public function __construct(public string $name) {}

    public function toArray(): array
    {
        return ['name' => $this->name];
    }
}
