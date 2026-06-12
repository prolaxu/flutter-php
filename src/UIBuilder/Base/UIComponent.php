<?php

namespace FlutterPHP\UIBuilder\Base;

abstract class UIComponent
{
    abstract protected function type(): string;

    abstract protected function props(): array;

    abstract protected function children(): array;

    public function toArray(): array
    {
        $props = $this->props();

        return [
            'type' => $this->type(),
            'props' => $props === [] ? new \stdClass : $props,
            'children' => array_map(fn ($c) => $c->toArray(), $this->children()),
        ];
    }
}
