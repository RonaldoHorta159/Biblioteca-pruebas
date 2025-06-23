@extends('layouts.app')

@section('content')
<section id="admin-content" class="p-6 bg-gray-100">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tablero</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      <!-- Authors Card -->
      <div class="bg-white border border-gray-200 rounded-lg shadow p-6 text-center">
        <p class="text-4xl font-bold text-indigo-600">{{ $authors }}</p>
        <a class="mt-2 text-sm font-medium text-gray-700 hover:text-blue-600" href="{{ route('authors') }}">Autores registrados</a>
      </div>

      <!-- Publishers Card -->
      <div class="bg-white border border-gray-200 rounded-lg shadow p-6 text-center">
        <p class="text-4xl font-bold text-indigo-600">{{ $publishers }}</p>
        <a class="mt-2 text-sm font-medium text-gray-700 hover:text-blue-600" href="{{ route('publishers') }}">Editoriales registradas</a>
      </div>

      <!-- Categories Card -->
      <div class="bg-white border border-gray-200 rounded-lg shadow p-6 text-center">
        <p class="text-4xl font-bold text-indigo-600">{{ $categories }}</p>
        <a class="mt-2 text-sm font-medium text-gray-700 hover:text-blue-600" href="{{ route('categories') }}">Categorías registradas</a>
      </div>

      <!-- Books Card -->
      <div class="bg-white border border-gray-200 rounded-lg shadow p-6 text-center">
        <p class="text-4xl font-bold text-indigo-600">{{ $books }}</p>
        <a class="mt-2 text-sm font-medium text-gray-700 hover:text-blue-600" href="{{ route('books') }}">Libros registrados</a>
      </div>

      <!-- Students Card -->
      <div class="bg-white border border-gray-200 rounded-lg shadow p-6 text-center">
        <p class="text-4xl font-bold text-indigo-600">{{ $students }}</p>
        <a class="mt-2 text-sm font-medium text-gray-700 hover:text-blue-600" href="{{ route('students') }}">Estudiantes registrados</a>
      </div>

      <!-- Issued Books Card -->
      <div class="bg-white border border-gray-200 rounded-lg shadow p-6 text-center">
        <p class="text-4xl font-bold text-indigo-600">{{ $issued_books }}</p>
        <a class="mt-2 text-sm font-medium text-gray-700 hover:text-blue-600" href="{{ route('book_issued') }}">Préstamos realizados</a>
      </div>
    </div>
  </div>
</section>
@endsection
