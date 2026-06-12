<?php

namespace FlutterPHP\UIBuilder\Actions;

class SocketDisconnectAction extends NativeAction
{
    public function __construct(
        public string $connectionId = 'default',
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'socket',
            method: 'disconnect',
            params: ['connectionId' => $connectionId],
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
