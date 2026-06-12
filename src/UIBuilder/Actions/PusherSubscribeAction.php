<?php

namespace FlutterPHP\UIBuilder\Actions;

class PusherSubscribeAction extends NativeAction
{
    public function __construct(
        string $channel,
        public string $connectionId = 'default',
        ?string $eventStoreKey = null,
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'pusher',
            method: 'subscribe',
            params: [
                'channel' => $channel,
                'connectionId' => $connectionId,
                'eventStoreKey' => $eventStoreKey ?? 'pusher.lastEvent',
            ],
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
