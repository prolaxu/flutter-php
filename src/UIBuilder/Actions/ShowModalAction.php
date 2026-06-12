<?php

namespace FlutterPHP\UIBuilder\Actions;

use FlutterPHP\UIBuilder\Base\UIComponent;

class ShowModalAction implements Action
{
    public function __construct(public UIComponent $content) {}

    public function toArray(): array
    {
        return [
            'type' => 'showModal',
            'content' => $this->content->toArray(),
        ];
    }
}
