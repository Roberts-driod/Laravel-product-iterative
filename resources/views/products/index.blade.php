
<x-layout>
    <h2>Products</h2>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <a href="{{ route('products.create') }}">
        Create product
    </a>

    <ul>
        @foreach ($products as $product)
            <li>
                <h3>{{ $product->name }}</h3>
                <h3>{{ $product->price }} $</h3>

                <a href="{{ route('products.show', $product) }}">Show</a>
                <a href="{{ route('products.edit', $product) }}">Edit</a>

                <form action="{{ route('products.destroy', $product) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
