<?php

namespace FlutterPHP\UIBuilder\Primitives;

class Currency
{
    public function __construct(
        public float $amount,
        public string $symbol = 'रू',
    ) {}

    public function __toString(): string
    {
        return "{$this->symbol}{$this->amount}";
    }
}
