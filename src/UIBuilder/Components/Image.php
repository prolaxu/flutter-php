<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\ImageUrl;

class Image extends UIComponent
{
    public function __construct(
        public ImageUrl $image,
        public ?int $width = null,
        public ?int $height = null,
    ) {}

    protected function type(): string
    {
        return 'Image';
    }

    protected function props(): array
    {
        return array_filter([
            'url' => $this->image->url,
            'width' => $this->width,
            'height' => $this->height,
        ], fn ($v) => $v !== null);
    }

    protected function children(): array
    {
        return [];
    }
}
