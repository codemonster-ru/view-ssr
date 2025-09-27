# codemonster-ru/view-ssr

SSR (Server-Side Rendering) engine for the [`codemonster-ru/view`](https://github.com/codemonster-ru/view) core.
Delegates actual rendering to a **bridge** (preferably `codemonster-ru/ssr-bridge`).

## 📦 Installation

Via Composer:

```bash
composer require codemonster-ru/view-ssr
```

## 🚀 Usage

```php
use Codemonster\View\View;
use Codemonster\View\Engines\SsrEngine;
use Codemonster\Ssr\SsrBridge; // from codemonster-ru/ssr-bridge

$bridge = new SsrBridge([
  // ...bridge-specific options: mode, entry paths, server URL, etc.
]);

$engine = new SsrEngine($bridge);
$view   = new View(['ssr' => $engine], 'ssr');

echo $view->render('home', ['message' => 'Hello']);
```

## 🧪 Testing

You can run tests with the command:

```bash
composer test
```

## 👨‍💻 Author

[**Kirill Kolesnikov**](https://github.com/KolesnikovKirill)

## 📜 License

[MIT](https://github.com/codemonster-ru/view-ssr/blob/main/LICENSE)
