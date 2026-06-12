<?php

namespace App\MobileUI\Components;

use FlutterPHP\UIBuilder\Actions\NavigateAction;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\DynamicButton;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Components\Text as TextComponent;
use FlutterPHP\UIBuilder\Primitives\Color;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;

class SignInFallback extends UIComponent
{
    public function __construct(public string $message, public bool $showRegisterButton = false) {}
    protected function type(): string { return 'Column'; }
    protected function props(): array { return ['crossAxisAlignment' => 'stretch', 'padding' => PaddingPrimitive::all(16)->toArray()]; }
    protected function children(): array
    {
        $children = [
            new TextComponent(new Text('Sign in required', style: new TextStyle(size: 20, weight: FontWeight::Bold))),
            new Spacer(height: 8),
            new TextComponent(new Text($this->message, style: new TextStyle(size: 14, color: new Color('#64748B')))),
            new Spacer(height: 24),
            new DynamicButton(label: new Text('Sign In'), style: 'elevated', action: new NavigateAction('/login')),
        ];
        if ($this->showRegisterButton) { $children[] = new Spacer(height: 12); $children[] = new DynamicButton(label: new Text('Create Account'), style: 'outlined', action: new NavigateAction('/register')); }
        return $children;
    }
}
