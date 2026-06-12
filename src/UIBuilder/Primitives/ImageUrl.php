<?php

namespace FlutterPHP\UIBuilder\Primitives;

class ImageUrl
{
    public function __construct(
        public string $url,
        public ?int $width = null,
        public ?int $height = null,
    ) {}
}
