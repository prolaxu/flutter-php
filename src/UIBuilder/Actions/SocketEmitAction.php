<?php

namespace FlutterPHP\UIBuilder\Actions;

class SocketEmitAction extends NativeAction
{
    public function __construct(
        array $payload,
        public string $connectionId = 'default',
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'socket',
            method: 'emit',
            params: [
                'connectionId' => $connectionId,
                'payload' => $payload,
            ],
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
