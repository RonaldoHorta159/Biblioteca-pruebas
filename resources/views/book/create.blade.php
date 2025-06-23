@extends('layouts.app')

@section('content')
<section class="p-6 bg-gray-100 min-h-full overflow-auto">
  <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow p-6 space-y-6">
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-semibold text-gray-800">Agregar libro</h1>
      <a href="{{ route('books') }}" class="text-indigo-600 hover:underline">Todos los libros</a>
    </div>

    <form action="{{ route('book.store') }}" method="POST" autocomplete="off" class="space-y-4">
      @csrf

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Título del libro</label>
        <input id="name" name="name" type="text" required placeholder="Título del libro"
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('name') border-red-600 @enderror"
               value="{{ old('name') }}">
        @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
        <select id="category_id" name="category_id" required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 bg-white focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('category_id') border-red-600 @enderror">
          <option value="">Selecciona una categoría</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        </select>
        @error('category_id')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="auther_id" class="block text-sm font-medium text-gray-700">Autor</label>
        <select id="auther_id" name="auther_id" required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 bg-white focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('auther_id') border-red-600 @enderror">
          <option value="">Selecciona un autor</option>
          @foreach($authors as $author)
            <option value="{{ $author->id }}" {{ old('auther_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
          @endforeach
        </select>
        @error('auther_id')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="publisher_id" class="block text-sm font-medium text-gray-700">Editorial</label>
        <select id="publisher_id" name="publisher_id" required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 bg-white focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('publisher_id') border-red-600 @enderror">
          <option value="">Selecciona una editorial</option>
          @foreach($publishers as $publisher)
            <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
          @endforeach
        </select>
        @error('publisher_id')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <button type="submit" class="w-full flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        Guardar
      </button>
    </form>
  </div>
</section>
@endsection
