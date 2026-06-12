<?php

namespace App\MobileUI\Components;

use App\MobileUI\Stores\CartStore;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\Row;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Components\Text as TextComponent;
use FlutterPHP\UIBuilder\Primitives\Color;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;
use FlutterPHP\UIBuilder\State\StoreRef;

class OrderPriceSummary extends UIComponent
{
    public function __construct(public string $storeName = 'cart') {}
    protected function type(): string { return 'Column'; }
    protected function props(): array { return ['padding' => PaddingPrimitive::all(12)->toArray()]; }
    protected function children(): array
    {
        return [self::priceRow('Subtotal', 'total', FontWeight::Bold, null, 15), new Spacer(height: 8), self::priceRow('Shipping', 'shipping', FontWeight::Normal, new Color('#64748B'), 14), new Spacer(height: 8), self::priceRow('Tax (13%)', 'tax', FontWeight::Normal, new Color('#64748B'), 14), new Spacer(height: 10), self::priceRow('Total', 'grandTotal', FontWeight::Bold, new Color('#E53935'), 16)];
    }
    private static function priceRow(string $label, string $field, FontWeight $weight = FontWeight::Normal, ?Color $color = null, int $size = 14): Row { $style = new TextStyle(size: $size, weight: $weight); if ($color !== null) { $style = new TextStyle(size: $size, weight: $weight, color: $color); } return new Row(mainAxisAlignment: 'spaceBetween', children: [new TextComponent(new Text($label, style: new TextStyle(size: $size))), new TextComponent(new Text((string) new StoreRef((new CartStore)->name(), $field), style: $style))]); }
}
