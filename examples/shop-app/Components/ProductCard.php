<?php

namespace App\MobileUI\Components;

use FlutterPHP\UIBuilder\Actions\NavigateAction;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\Card;
use FlutterPHP\UIBuilder\Components\Clickable;
use FlutterPHP\UIBuilder\Components\Column;
use FlutterPHP\UIBuilder\Components\Image;
use FlutterPHP\UIBuilder\Components\Padding;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Components\Text as TextComponent;
use FlutterPHP\UIBuilder\Primitives\Color;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\ImageUrl;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;

class ProductCard extends UIComponent
{
    public function __construct(public string $navigateRoute = '/products/{{item.id}}') {}
    protected function type(): string { return 'Card'; }
    protected function props(): array { return []; }
    protected function children(): array
    {
        return [new Clickable(action: new NavigateAction($this->navigateRoute), child: new Column(crossAxisAlignment: 'stretch', children: [
            new Image(new ImageUrl('{{item.image}}'), height: null),
            new Padding(padding: PaddingPrimitive::all(10), child: new Column(children: [
                new TextComponent(new Text('{{item.title}}', style: new TextStyle(size: 13, weight: FontWeight::Bold))),
                new Spacer(height: 6),
                new TextComponent(new Text('{{item.price_label}}', style: new TextStyle(size: 15, weight: FontWeight::Bold, color: new Color('#E53935')))),
            ])),
        ]))];
    }
}
