<?php

namespace App\MobileUI\Screens;

use App\MobileUI\Components\OrderPriceSummary;
use App\MobileUI\Components\ShopBottomNav;
use App\MobileUI\Stores\CartStore;
use FlutterPHP\UIBuilder\Actions\NavigateAction;
use FlutterPHP\UIBuilder\Actions\Store\ClearStoreAction;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\Column;
use FlutterPHP\UIBuilder\Components\DynamicButton;
use FlutterPHP\UIBuilder\Components\Padding;
use FlutterPHP\UIBuilder\Components\Row;
use FlutterPHP\UIBuilder\Components\Scaffold;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Components\StoreList;
use FlutterPHP\UIBuilder\Components\Text as TextComponent;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;
use FlutterPHP\UIBuilder\State\StoreRef;

class CartScreen
{
    public static function build(): UIComponent
    {
        $store = new CartStore;

        return new Scaffold(
            title: new Text('Shopping Cart'), showBackButton: false,
            body: new Column(children: [
                new Padding(padding: PaddingPrimitive::all(16), child: new Row(mainAxisAlignment: 'spaceBetween', children: [
                    new TextComponent(new Text((string) new StoreRef($store->name(), 'count').' Items', style: new TextStyle(size: 16, weight: FontWeight::Bold))),
                    new DynamicButton(label: new Text('Clear'), style: 'text', action: new ClearStoreAction('cart')),
                ])),
                new Padding(padding: PaddingPrimitive::horizontal(16), child: new StoreList(storeKey: 'cart', itemMapping: ['title' => 'title', 'subtitle' => '{{price_label}} · Qty {{quantity}}', 'image' => 'image', 'route' => '/products/{{product_id}}', 'onRemove' => '__remove__'], emptyMessage: 'Your cart is empty.')),
                new Spacer(height: 8),
                new Padding(padding: PaddingPrimitive::horizontal(16), child: new OrderPriceSummary(storeName: 'cart')),
                new Spacer(height: 16),
                new Padding(padding: PaddingPrimitive::horizontal(16), child: new DynamicButton(label: new Text('Checkout'), style: 'elevated', action: new NavigateAction('/checkout'))),
                new Spacer(height: 24),
            ]),
            bottomNavItems: ShopBottomNav::items(),
        );
    }

    public static function store(): CartStore { return new CartStore; }
}
