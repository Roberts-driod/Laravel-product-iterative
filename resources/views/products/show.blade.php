<x-layout>
    <h2>{{ $product->name }}</h2>

    <p>Quantity: {{ $product->quantity }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Expiration date: {{ $product->expiration_date }}</p>
    <p>Status: {{ $product->status }}</p>
    <p>Price: {{ $product->price }} $</p>

    <h3>Quantity: {{ $product->quantity }}</h3>

    <h4>Increase quantity</h4>

    <form action="{{ route('products.quantity.increase', $product) }}" method="POST">
        @csrf

        <input
            type="number"
            name="amount"
            min="1"
            value="1"
            required
        >

        <button type="submit">Add stock</button>
    </form>

    <h4>Decrease quantity</h4>

    <form action="{{ route('products.quantity.decrease', $product) }}" method="POST">
        @csrf

        <input
            type="number"
            name="amount"
            min="1"
            value="1"
            required
        >

        <button type="submit">Remove stock</button>
    </form>

    <a href="{{ route('products.edit', $product) }}">Edit</a>
    <a href="{{ route('products.index') }}">Back</a>
</x-layout>

