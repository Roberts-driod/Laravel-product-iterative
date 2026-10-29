

<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Books
        </h2>
    </x-slot>
   

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      <ul>
        @foreach($books as $book)
            <li>
                <h2>{{ $book->title }}</h2>
                <div>
                    <a href="{{ route('book.show', $book) }}">Show</a>
                    <a href="{{ route('book.edit', $book) }}">Edit</a>
                    <a href="{{ route('book.create') }}">Create a book</a>
                </div>
            </li>
        @endforeach
    </ul>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>
</x-app-layout>