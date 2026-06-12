<?php

namespace FlutterPHP\UIBuilder\Actions;

class PusherConnectAction extends NativeAction
{
    public function __construct(
        public string $connectionId = 'default',
        ?string $resultStoreKey = 'pusher.status',
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'pusher',
            method: 'connect',
            params: ['connectionId' => $connectionId],
            resultStoreKey: $resultStoreKey,
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
