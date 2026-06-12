<?php

namespace App\MobileUI\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class ProductGrid extends UIComponent
{
    public function __construct(public string $dataSource, public string $emptyMessage = 'No products found.', public array $watchStoreKeys = [], public ?UIComponent $item = null) {}
    protected function type(): string { return 'RemoteList'; }
    protected function props(): array { return ['dataSource' => $this->dataSource, 'itemsPath' => 'data', 'watchStoreKeys' => $this->watchStoreKeys, 'emptyMessage' => $this->emptyMessage, 'layout' => 'grid', 'crossAxisCount' => 2, 'childAspectRatio' => 0.72, 'itemMapping' => ['title' => 'title', 'subtitle' => 'price_label', 'image' => 'image', 'route' => '/products/{{id}}'],]; }
    protected function children(): array { return $this->item !== null ? [$this->item] : []; }
}
