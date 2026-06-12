<?php

namespace App\MobileUI\Stores;

use FlutterPHP\UIBuilder\Actions\Store\ClearStoreAction;
use FlutterPHP\UIBuilder\State\Store;

class SearchStore extends Store
{
    public function name(): string { return 'search'; }
    public function initialState(): array { return ['query' => '', 'category' => '', 'sortBy' => '']; }
    public function actions(): array { return [new ClearStoreAction('search')]; }
}
