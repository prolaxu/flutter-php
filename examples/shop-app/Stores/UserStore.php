<?php

namespace App\MobileUI\Stores;

use FlutterPHP\UIBuilder\Actions\Store\ClearStoreAction;
use FlutterPHP\UIBuilder\State\Store;

class UserStore extends Store { public function name(): string { return 'user'; } public function initialState(): array { return ['name' => '', 'email' => '', 'token' => '', 'isLoggedIn' => false, 'avatar' => '', 'memberSince' => '']; } public function actions(): array { return [new ClearStoreAction('user')]; } }
