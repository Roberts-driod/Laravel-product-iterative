
<x-layout>
    <h2>Edit product</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name"
               value="{{ old('name', $product->name) }}">

        <label>Quantity:</label>
        <input type="number" name="quantity"
               value="{{ old('quantity', $product->quantity) }}">

        <label>Description:</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>

        <label>Expiration date:</label>
        <input type="date" name="expiration_date"
               value="{{ old('expiration_date', $product->expiration_date) }}">

        <label>Status:</label>
        <select name="status">
            @foreach (['active', 'inactive', 'expired'] as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $product->status) === $status)>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>

        <label>Price:</label>
        <input type="number" step="0.01" name="price"
               value="{{ old('price', $product->price) }}">

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('products.index') }}">Back</a>
</x-layout>
