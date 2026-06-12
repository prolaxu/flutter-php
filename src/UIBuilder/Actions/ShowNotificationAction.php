<?php

namespace FlutterPHP\UIBuilder\Actions;

use FlutterPHP\UIBuilder\Primitives\Text;

class ShowNotificationAction extends NativeAction
{
    public function __construct(
        Text|string $title,
        Text|string $body,
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'notification',
            method: 'show',
            params: [
                'title' => (string) $title,
                'body' => (string) $body,
            ],
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
