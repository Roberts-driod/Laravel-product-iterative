
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Products') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <header>
        <h1>Products Application</h1>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>Products Application</p>
    </footer>

</body>
</html>
