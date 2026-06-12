<?php

namespace FlutterPHP\UIBuilder\Actions;

class OpenCameraAction extends NativeAction
{
    public function __construct(
        public string $source = 'camera',
        public ?string $resultStoreKey = 'media.lastPhoto',
        ?Action $onSuccess = null,
        ?Action $onError = null,
    ) {
        parent::__construct(
            plugin: 'camera',
            method: 'pick',
            params: ['source' => $source],
            resultStoreKey: $resultStoreKey,
            onSuccess: $onSuccess,
            onError: $onError,
        );
    }
}
