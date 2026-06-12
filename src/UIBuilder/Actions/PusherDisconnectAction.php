<?php

namespace FlutterPHP\UIBuilder\Actions;

class PusherDisconnectAction extends NativeAction
{
    public function __construct(
        public string $connectionId = 'default',
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'pusher',
            method: 'disconnect',
            params: ['connectionId' => $connectionId],
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
