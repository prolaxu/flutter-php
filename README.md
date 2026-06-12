# FlutterPHP

Build Flutter mobile UIs entirely from PHP. Your app lives in `app/MobileUI/` — you never touch Flutter except to build and publish. Paired with [Flutter Kit](https://github.com/prolaxu/flutter-kit) renderer.

## How it works

```
PHP (app/MobileUI/) → JSON manifest → Flutter renderer → Native app
```

You define screens, components, routes, stores, and theme in PHP classes. A CLI command generates `app_structure.json`. The Flutter renderer parses this JSON and renders the entire app at runtime — no Flutter code needed per project.

## Installation

```bash
composer require prolaxu/flutter-php
```

The service provider auto-registers via Laravel package discovery.

Pair with **[Flutter Kit](https://github.com/prolaxu/flutter-kit)** — the JSON-driven Flutter renderer.

## Quick start

```bash
php artisan flutter-php:init-app MyApp
php artisan flutter-php:generate-structure
```

Serve at `GET /api/app-structure`. Point your Flutter Kit at this URL.

## Structure

```
app/MobileUI/
├── AppStructure.php        # Manifest definition
├── Components/             # Reusable UI components (ProductCard, etc.)
├── Screens/                # Screen definitions
├── Stores/                 # Reactive state stores
└── Theme/                  # App theme

packages/flutter-php/src/UIBuilder/
├── Components/             # 33 built-in components (Scaffold, Row, RemoteList, etc.)
├── Actions/                # 20+ action types (navigate, apiCall, setStoreValue, etc.)
├── Structure/              # App manifest structure (routes, environment, etc.)
├── State/                  # Store references and state bindings
├── Primitives/             # Text, TextStyle, Color, Padding, etc.
└── Base/                   # UIComponent base class
```

## Defining a screen

```php
class HomeScreen
{
    public static function build(): UIComponent
    {
        return new Scaffold(
            title: new Text('My App'),
            body: new Column(
                children: [
                    new TextComponent(new Text('Hello from PHP!')),
                ],
            ),
        );
    }
}
```

## License

MIT
