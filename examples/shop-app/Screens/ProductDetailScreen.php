<?php

namespace App\MobileUI\Screens;

use FlutterPHP\UIBuilder\Actions\ApiCallAction;
use FlutterPHP\UIBuilder\Actions\NavigateAction;
use FlutterPHP\UIBuilder\Actions\ShowNotificationAction;
use FlutterPHP\UIBuilder\Actions\Store\AddToCartAction;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\Badge;
use FlutterPHP\UIBuilder\Components\Carousel;
use FlutterPHP\UIBuilder\Components\Column;
use FlutterPHP\UIBuilder\Components\DynamicButton;
use FlutterPHP\UIBuilder\Components\Padding;
use FlutterPHP\UIBuilder\Components\RemoteDetail;
use FlutterPHP\UIBuilder\Components\Row;
use FlutterPHP\UIBuilder\Components\Scaffold;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Components\Text as TextComponent;
use FlutterPHP\UIBuilder\Components\When;
use FlutterPHP\UIBuilder\Primitives\Color;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;

/**
 * Product detail with carousel, price, stock badge, add to cart/wishlist.
 */
class ProductDetailScreen
{
    public static function build(): UIComponent
    {
        return new Scaffold(
            title: new Text('Product'),
            showBackButton: true,
            body: new RemoteDetail(
                dataSource: '/products/{{params.id}}',
                children: [
                    new Column(children: [
                        new Carousel(useItemImages: true),
                        new Padding(padding: PaddingPrimitive::all(16), child: new Column(children: [
                            new Row(mainAxisAlignment: 'spaceBetween', children: [
                                new TextComponent(new Text('{{item.title}}', style: new TextStyle(size: 22, weight: FontWeight::Bold))),
                                new When(watch: '{{item.in_stock}}', equals: true, child: new Badge(label: new Text('In Stock', style: new TextStyle(size: 11)), variant: 'success'), else: new Badge(label: new Text('Out of Stock', style: new TextStyle(size: 11)), variant: 'error')),
                            ]),
                            new Spacer(height: 8),
                            new TextComponent(new Text('{{item.price_label}}', style: new TextStyle(size: 28, weight: FontWeight::Bold, color: new Color('#E53935')))),
                            new Spacer(height: 16),
                            new TextComponent(new Text('{{item.description}}', style: new TextStyle(size: 14, color: new Color('#666666')))),
                            new Spacer(height: 24),
                            new Row(mainAxisAlignment: 'center', crossAxisAlignment: 'stretch', expandChildren: true, children: [
                                new DynamicButton(label: new Text('Add to Cart'), style: 'elevated', action: new AddToCartAction('cart', ['product_id' => '{{item.id}}', 'title' => '{{item.title}}', 'price' => '{{item.price}}', 'price_label' => '{{item.price_label}}', 'quantity' => 1, 'image' => '{{item.image}}'], onSuccess: new ShowNotificationAction('Added', 'Item added to cart'))),
                            ]),
                        ])),
                    ]),
                ],
            ),
        );
    }
}
