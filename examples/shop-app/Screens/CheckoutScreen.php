<?php

namespace App\MobileUI\Screens;

use App\MobileUI\Components\OrderPriceSummary;
use App\MobileUI\Components\SignInFallback;
use App\MobileUI\Stores\CartStore;
use App\MobileUI\Stores\CheckoutStore;
use FlutterPHP\UIBuilder\Actions\ApiCallAction;
use FlutterPHP\UIBuilder\Actions\NavigateAction;
use FlutterPHP\UIBuilder\Actions\ShowNotificationAction;
use FlutterPHP\UIBuilder\Actions\Store\ClearStoreAction;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\AuthGuard;
use FlutterPHP\UIBuilder\Components\Column;
use FlutterPHP\UIBuilder\Components\Dropdown;
use FlutterPHP\UIBuilder\Components\DynamicButton;
use FlutterPHP\UIBuilder\Components\Padding;
use FlutterPHP\UIBuilder\Components\Row;
use FlutterPHP\UIBuilder\Components\Scaffold;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Components\Text as TextComponent;
use FlutterPHP\UIBuilder\Components\TextInput;
use FlutterPHP\UIBuilder\Components\When;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;
use FlutterPHP\UIBuilder\State\StoreRef;

class CheckoutScreen
{
    public static function build(): UIComponent
    {
        $store = new CheckoutStore;
        $cartStore = new CartStore;

        return new Scaffold(
            title: new Text('Checkout'), showBackButton: true, backRoute: '/cart',
            body: new AuthGuard(
                message: 'Sign in to checkout.',
                child: new Padding(padding: PaddingPrimitive::all(16), child: new Column(children: [
                    new TextComponent(new Text('Shipping', style: new TextStyle(size: 18, weight: FontWeight::Bold))),
                    new Spacer(height: 16),
                    new TextInput(label: new Text('Full Name'), placeholder: new Text('Your name'), stateRef: new StoreRef($store->name(), 'shippingName')),
                    new Spacer(height: 12),
                    new TextInput(label: new Text('Phone'), placeholder: new Text('98XXXXXXXX'), stateRef: new StoreRef($store->name(), 'shippingPhone')),
                    new Spacer(height: 12),
                    new TextInput(label: new Text('Address'), placeholder: new Text('Street, house number'), stateRef: new StoreRef($store->name(), 'shippingAddress')),
                    new Spacer(height: 12),
                    new Row(expandChildren: true, children: [
                        new TextInput(label: new Text('City'), placeholder: new Text('City'), stateRef: new StoreRef($store->name(), 'shippingCity')),
                        new Spacer(width: 12),
                        new TextInput(label: new Text('ZIP'), placeholder: new Text('ZIP'), stateRef: new StoreRef($store->name(), 'shippingZip')),
                    ]),
                    new Spacer(height: 24),
                    new TextComponent(new Text('Payment', style: new TextStyle(size: 18, weight: FontWeight::Bold))),
                    new Spacer(height: 12),
                    new Dropdown(label: new Text('Method'), options: ['Cash on Delivery', 'eSewa', 'Khalti'], stateRef: new StoreRef($store->name(), 'paymentMethod'), initialValue: 'Cash on Delivery'),
                    new Spacer(height: 24),
                    new TextComponent(new Text('Summary', style: new TextStyle(size: 18, weight: FontWeight::Bold))),
                    new Spacer(height: 12),
                    new OrderPriceSummary(storeName: 'cart'),
                    new Spacer(height: 16),
                    new When(watch: new StoreRef($cartStore->name(), 'count'), equals: 0, child: new DynamicButton(label: new Text('Place Order'), style: 'elevated', disabled: true), else: new DynamicButton(label: new Text('Place Order'), style: 'elevated', action: new ApiCallAction(url: '/orders', method: 'POST', body: ['shippingName' => '{{store.checkout.shippingName}}', 'shippingPhone' => '{{store.checkout.shippingPhone}}', 'shippingAddress' => '{{store.checkout.shippingAddress}}', 'shippingCity' => '{{store.checkout.shippingCity}}', 'shippingZip' => '{{store.checkout.shippingZip}}', 'paymentMethod' => '{{store.checkout.paymentMethod}}', 'items' => '{{store.cart.items}}'], onSuccess: new ClearStoreAction('cart', onSuccess: new ClearStoreAction('checkout', onSuccess: new ShowNotificationAction('Order placed', 'Success!', onSuccess: new NavigateAction('/home')))), onError: new ShowNotificationAction('Failed', 'Try again')))),
                    new Spacer(height: 16),
                ])),
                fallback: new SignInFallback('Sign in to complete your purchase.'),
            ),
        );
    }

    public static function store(): CheckoutStore { return new CheckoutStore; }
}
