<?php

namespace FlutterPHP\UIBuilder\Actions;

class RegisterPushTokenAction extends NativeAction
{
    public function __construct(
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'notification',
            method: 'registerToken',
            params: [],
            resultStoreKey: 'push.token',
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
