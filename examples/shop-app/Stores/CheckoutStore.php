<?php

namespace App\MobileUI\Stores;

use FlutterPHP\UIBuilder\Actions\Store\ClearStoreAction;
use FlutterPHP\UIBuilder\State\Store;

class CheckoutStore extends Store
{
    public function name(): string { return 'checkout'; }
    public function initialState(): array { return ['shippingName' => '', 'shippingPhone' => '', 'shippingAddress' => '', 'shippingCity' => '', 'shippingZip' => '', 'paymentMethod' => 'Cash on Delivery']; }
    public function actions(): array { return [new ClearStoreAction('checkout')]; }
}
