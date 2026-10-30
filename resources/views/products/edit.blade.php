
<x-layout>
    <h1>Edit product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name"
               value="{{ old('name', $product->name) }}">

        <label>Description:</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>

        <label>Price:</label>
        <input type="number" step="0.01" name="price"
               value="{{ old('price', $product->price) }}">

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('products.index') }}">Back</a>
</x-layout>
