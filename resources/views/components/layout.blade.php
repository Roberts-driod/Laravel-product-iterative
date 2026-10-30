
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
            <h1>MyProducts Logo</h1>
        </header>

        <nav class="sidebar">
            <h3>Navigation</h3>

            <ul>
                <li>
                    <a href="{{ route('products.index') }}">Products</a>
                </li>
                <li>
                    <a href="{{ route('products.create') }}">Create product</a>
                </li>
            </ul>
        </nav>

        <main>
            {{ $slot }}
        </main>

        <aside>
            <h3>Advertisement</h3>
            <p>Check out our latest products!</p>
        </aside>

        <footer>
            <p>&copy; {{ date('Y') }} MyProducts. All rights reserved.</p>
        </footer>

    </div>

</body>
</html>
