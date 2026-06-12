<?php

namespace App\MobileUI\Components;

class ShopBottomNav
{
    public static function items(): array
    {
        return [
            ['label' => 'Home', 'icon' => 'Home01', 'route' => '/home'],
            ['label' => 'Cart', 'icon' => 'ShoppingCart01', 'route' => '/cart'],
            ['label' => 'Profile', 'icon' => 'UserCircle', 'route' => '/profile'],
        ];
    }
}
