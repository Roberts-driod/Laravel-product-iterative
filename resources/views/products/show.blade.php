<x-layout>
    <h2>{{ $product->name }}</h2>

    <p>Quantity: {{ $product->quantity }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Expiration date: {{ $product->expiration_date }}</p>
    <p>Status: {{ $product->status }}</p>
    <p>Price: {{ $product->price }} $</p>

    <a href="{{ route('products.edit', $product) }}">Edit</a>
    <a href="{{ route('products.index') }}">Back</a>
</x-layout>