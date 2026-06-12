<?php

namespace FlutterPHP\UIBuilder\Actions;

class SocketConnectAction extends NativeAction
{
    public function __construct(
        string $url,
        public string $connectionId = 'default',
        ?string $resultStoreKey = 'socket.status',
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'socket',
            method: 'connect',
            params: [
                'url' => $url,
                'connectionId' => $connectionId,
            ],
            resultStoreKey: $resultStoreKey,
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
