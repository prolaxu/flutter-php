<?php

namespace App\MobileUI\Screens;

use App\MobileUI\Components\ProductCard;
use App\MobileUI\Components\ProductGrid;
use App\MobileUI\Components\ShopBottomNav;
use App\MobileUI\Stores\SearchStore;
use FlutterPHP\UIBuilder\Actions\NavigateAction;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\Column;
use FlutterPHP\UIBuilder\Components\DynamicButton;
use FlutterPHP\UIBuilder\Components\Padding;
use FlutterPHP\UIBuilder\Components\Row;
use FlutterPHP\UIBuilder\Components\Scaffold;
use FlutterPHP\UIBuilder\Components\SearchBar;
use FlutterPHP\UIBuilder\Components\SectionHeader;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Primitives\Color;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\IconName;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;
use FlutterPHP\UIBuilder\State\StoreRef;

/**
 * Home screen with search, categories, and featured product grid.
 */
class HomeScreen
{
    public static function build(): UIComponent
    {
        $searchStore = new SearchStore;

        return new Scaffold(
            title: new Text('Shop'),
            showBackButton: false,
            body: new Column(
                crossAxisAlignment: 'stretch',
                children: [
                    new Padding(
                        padding: PaddingPrimitive::all(16),
                        child: new SearchBar(
                            stateRef: new StoreRef($searchStore->name(), 'query'),
                            submitRoute: '/search',
                        ),
                    ),
                    new Padding(
                        padding: PaddingPrimitive::horizontal(16),
                        child: new SectionHeader(
                            title: new Text('Categories', style: new TextStyle(size: 20, weight: FontWeight::Bold)),
                        ),
                    ),
                    new Spacer(height: 12),
                    new Padding(
                        padding: PaddingPrimitive::horizontal(16),
                        child: new Row(scroll: true, children: [
                            self::chip('Electronics', 'Computer'), new Spacer(width: 8),
                            self::chip('Fashion', 'Dress01'), new Spacer(width: 8),
                            self::chip('Home', 'Home01'), new Spacer(width: 8),
                            self::chip('Sports', 'Football'), new Spacer(width: 8),
                            self::chip('Books', 'Book01'),
                        ]),
                    ),
                    new Spacer(height: 24),
                    new Padding(
                        padding: PaddingPrimitive::horizontal(16),
                        child: new SectionHeader(
                            title: new Text('Featured', style: new TextStyle(size: 20, weight: FontWeight::Bold)),
                            actionLabel: new Text('See All', style: new TextStyle(size: 14, weight: FontWeight::Bold, color: new Color('#6366F1'))),
                            actionRoute: '/search',
                        ),
                    ),
                    new Spacer(height: 12),
                    new Padding(
                        padding: PaddingPrimitive::horizontal(16),
                        child: new ProductGrid(dataSource: '/products/featured', emptyMessage: 'No featured items.', item: new ProductCard),
                    ),
                    new Spacer(height: 24),
                ],
            ),
            bottomNavItems: ShopBottomNav::items(),
        );
    }

    private static function chip(string $label, string $icon): UIComponent
    {
        return new DynamicButton(
            label: new Text($label), icon: new IconName($icon), style: 'chip',
            action: new NavigateAction('/search', query: ['category' => $label], store: 'search'),
        );
    }
}
