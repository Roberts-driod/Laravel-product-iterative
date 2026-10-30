
<x-layout>
    <h1>Create product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <p>{{ $message }}</p> @enderror

        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}">
        @error('price') <p>{{ $message }}</p> @enderror

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('products.index') }}">Back</a>
</x-layout>

