<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\ImageUrl;

class Carousel extends UIComponent
{
    public function __construct(
        public array $images = [],
        public bool $useItemImages = false,
    ) {}

    protected function type(): string
    {
        return 'Carousel';
    }

    protected function props(): array
    {
        return array_filter([
            'images' => array_map(fn (ImageUrl $img) => $img->url, $this->images),
            'useItemImages' => $this->useItemImages ?: null,
        ], fn ($value) => $value !== null && $value !== []);
    }

    protected function children(): array
    {
        return [];
    }
}
