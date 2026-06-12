<?php

namespace App\MobileUI\Screens;

use App\MobileUI\Components\ProductCard;
use App\MobileUI\Components\ProductGrid;
use App\MobileUI\Components\ShopBottomNav;
use App\MobileUI\Stores\SearchStore;
use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Components\Column;
use FlutterPHP\UIBuilder\Components\Padding;
use FlutterPHP\UIBuilder\Components\Scaffold;
use FlutterPHP\UIBuilder\Components\SearchBar;
use FlutterPHP\UIBuilder\Components\SectionHeader;
use FlutterPHP\UIBuilder\Components\Spacer;
use FlutterPHP\UIBuilder\Primitives\FontWeight;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;
use FlutterPHP\UIBuilder\Primitives\Text;
use FlutterPHP\UIBuilder\Primitives\TextStyle;
use FlutterPHP\UIBuilder\State\StoreRef;

class SearchScreen
{
    public static function build(): UIComponent
    {
        $store = new SearchStore;
        return new Scaffold(title: new Text('Search'), showBackButton: false, body: new Column(crossAxisAlignment: 'stretch', children: [
            new Padding(padding: PaddingPrimitive::all(16), child: new SearchBar(stateRef: new StoreRef($store->name(), 'query'), submitRoute: '/search')),
            new Spacer(height: 16),
            new Padding(padding: PaddingPrimitive::horizontal(16), child: new SectionHeader(title: new Text('Results', style: new TextStyle(size: 18, weight: FontWeight::Bold)))),
            new Spacer(height: 8),
            new Padding(padding: PaddingPrimitive::horizontal(16), child: new ProductGrid(dataSource: '/search?q={{store.search.query}}', watchStoreKeys: ['search.query'], emptyMessage: 'No results. Try a different search.', item: new ProductCard)),
        ]), bottomNavItems: ShopBottomNav::items());
    }
    public static function store(): SearchStore { return new SearchStore; }
}
