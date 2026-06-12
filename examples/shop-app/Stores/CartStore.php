<?php

namespace App\MobileUI\Stores;

use FlutterPHP\UIBuilder\Actions\Store\AddToCartAction;
use FlutterPHP\UIBuilder\Actions\Store\ClearStoreAction;
use FlutterPHP\UIBuilder\Actions\Store\RemoveFromCartAction;
use FlutterPHP\UIBuilder\Actions\Store\UpdateCartQuantityAction;
use FlutterPHP\UIBuilder\State\Store;

class CartStore extends Store
{
    public function name(): string { return 'cart'; }
    public function persist(): bool { return true; }
    public function initialState(): array { return ['items' => [], 'subtotalAmount' => 0, 'total' => 'रू0.00', 'shipping' => 'रू4.99', 'taxAmount' => 0, 'tax' => 'रू0.00', 'grandTotal' => 'रू0.00', 'count' => 0]; }
    public function actions(): array { return [new AddToCartAction('cart', ['product_id' => '', 'title' => '', 'price' => 0, 'quantity' => 1, 'image' => '']), new RemoveFromCartAction('cart', 0), new UpdateCartQuantityAction('cart', 0, 1), new ClearStoreAction('cart')]; }
    public function computed(): array { return ['count' => ['op' => 'listSum', 'path' => 'items', 'field' => 'quantity'], 'subtotalAmount' => ['op' => 'listProductSumAmount', 'path' => 'items', 'priceField' => 'price', 'quantityField' => 'quantity'], 'total' => ['op' => 'formatAmount', 'sourceField' => 'subtotalAmount', 'prefix' => 'रू', 'decimals' => 2], 'taxAmount' => ['op' => 'percentageOfField', 'sourceField' => 'subtotalAmount', 'percent' => 13], 'tax' => ['op' => 'formatAmount', 'sourceField' => 'taxAmount', 'prefix' => 'रू', 'decimals' => 2], 'shipping' => ['op' => 'constantFormatted', 'value' => 4.99, 'prefix' => 'रू', 'decimals' => 2], 'grandTotal' => ['op' => 'sumAmountFields', 'fields' => ['subtotalAmount', 'taxAmount'], 'add' => 4.99, 'prefix' => 'रू', 'decimals' => 2]]; }
}
