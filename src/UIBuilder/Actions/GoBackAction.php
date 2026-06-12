<?php

namespace FlutterPHP\UIBuilder\Actions;

class GoBackAction implements Action
{
    public function toArray(): array
    {
        return ['type' => 'goBack'];
    }
}
