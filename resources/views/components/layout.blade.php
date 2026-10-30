
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Products') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="layout">

        <header>
            <h1>Products Application</h1>
        </header>

        <nav>
            <h3>Navigation</h3>
            <a href="{{ route('products.index') }}">Products</a>
            <a href="{{ route('products.create') }}">Create product</a>
        </nav>

        <main>
            {{ $slot }}
        </main>

        <aside>
            <h3>Sidebar</h3>
            <p>Additional information</p>
        </aside>

        <footer>
            <p>Products Application &copy; {{ date('Y') }}</p>
        </footer>

    </div>

</body>
</html>
