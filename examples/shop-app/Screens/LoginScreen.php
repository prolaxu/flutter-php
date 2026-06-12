<?php

namespace App\MobileUI\Screens;

use App\MobileUI\Stores\AuthStore;
use FlutterPHP\UIBuilder\Actions\ApiCallAction;
use FlutterPHP\UIBuilder\Actions\NavigateAction;
use FlutterPHP\UIBuilder\Actions\NavigateAfterAuthAction;
use FlutterPHP\UIBuilder\Actions\ShowNotificationAction;
use FlutterPHP\UIBuilder\Actions\Store\ClearStoreAction;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\Column;
use FlutterPHP\UIBuilder\Components\DynamicButton;
use FlutterPHP\UIBuilder\Components\Padding;
use FlutterPHP\UIBuilder\Components\Scaffold;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Components\Text as TextComponent;
use FlutterPHP\UIBuilder\Components\TextInput;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;
use FlutterPHP\UIBuilder\State\StoreRef;

class LoginScreen
{
    public static function build(): UIComponent
    {
        $store = new AuthStore;

        return new Scaffold(title: new Text('Sign In'), showBackButton: true, body: new Padding(padding: PaddingPrimitive::all(16), child: new Column(crossAxisAlignment: 'stretch', children: [
            new TextComponent(new Text('Welcome', style: new TextStyle(size: 24, weight: FontWeight::Bold))),
            new Spacer(height: 8),
            new TextComponent(new Text('Sign in to your account', style: new TextStyle(size: 14))),
            new Spacer(height: 24),
            new TextInput(label: new Text('Email'), placeholder: new Text('you@example.com'), stateRef: new StoreRef($store->name(), 'email'), keyboardType: 'email'),
            new Spacer(height: 12),
            new TextInput(label: new Text('Password'), placeholder: new Text('Password'), stateRef: new StoreRef($store->name(), 'password'), obscureText: true),
            new Spacer(height: 24),
            new DynamicButton(label: new Text('Sign In'), style: 'elevated', action: new ApiCallAction(url: '/auth/login', method: 'POST', body: ['email' => '{{store.auth.email}}', 'password' => '{{store.auth.password}}'], resultMap: ['token' => 'user.token', 'user.name' => 'user.name', 'user.email' => 'user.email'], onSuccess: new ClearStoreAction('auth', onSuccess: new ShowNotificationAction('Welcome', 'Signed in', onSuccess: new NavigateAfterAuthAction('/profile'))), onError: new ShowNotificationAction('Failed', 'Check credentials'))),
            new Spacer(height: 16),
            new DynamicButton(label: new Text('Create account'), style: 'text', action: new NavigateAction('/register')),
        ])));
    }

    public static function store(): AuthStore { return new AuthStore; }
}
