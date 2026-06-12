# FlutterPHP

Build Flutter mobile UIs entirely from PHP. Your app lives in `app/MobileUI/` — you never touch Flutter except to build and publish.

## How it works

```
PHP (app/MobileUI/) → JSON manifest → Flutter renderer → Native app
```

You define screens, components, routes, stores, and theme in PHP classes. A CLI command generates `app_structure.json`. The Flutter renderer parses this JSON and renders the entire app at runtime — no Flutter code needed per project.

## Installation

```bash
composer require nepicsoft/flutter-php
```

The service provider auto-registers via Laravel package discovery.

## Quick start

```bash
# Generate the UI manifest
php artisan ui:generate-structure
```

Serve at `GET /api/app-structure`. Point your Flutter renderer at this URL.

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
