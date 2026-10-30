
<x-layout>
    <h2>Create product</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <label>Quantity:</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}">

        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label>Expiration date:</label>
        <input type="date" name="expiration_date"
               value="{{ old('expiration_date') }}">

        <label>Status:</label>
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="expired">Expired</option>
        </select>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}">

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('products.index') }}">Back</a>
</x-layout>
