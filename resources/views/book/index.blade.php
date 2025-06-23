@extends('layouts.app')

@section('content')
<section class="p-6 bg-gray-100 min-h-full overflow-auto">
  <div class="max-w-7xl mx-auto bg-white border border-gray-200 rounded-lg shadow p-6 space-y-6">
    {{-- Encabezado con título y botón --}}
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-semibold text-gray-800">Libros</h1>
      <a href="{{ route('book.create') }}" class="inline-block rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        Agregar libro
      </a>
    </div>

    {{-- Tabla de libros --}}
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Título</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Autor</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Editorial</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Estado</th>
            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($books as $book)
            <tr>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $book->id }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $book->name }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $book->category->name }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $book->auther->name }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $book->publisher->name }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">
                @if ($book->status === 'Y')
                  <span class="inline-flex items-center px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-medium">Disponible</span>
                @else
                  <span class="inline-flex items-center px-2 py-1 rounded bg-red-100 text-red-800 text-xs font-medium">Prestado</span>
                @endif
              </td>
              <td class="px-4 py-2 text-sm text-gray-700 text-right space-x-2">
                <a href="{{ route('book.edit', $book) }}" class="inline-flex p-1 rounded hover:bg-green-100 text-green-600 focus:outline-none focus:ring-2 focus:ring-green-500" title="Editar">
                  <x-heroicon-o-pencil class="h-5 w-5" />
                </a>
                <form action="{{ route('book.destroy', $book) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este libro?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="inline-flex p-1 rounded hover:bg-red-100 text-red-600 focus:outline-none focus:ring-2 focus:ring-red-500" title="Eliminar">
                    <x-heroicon-o-trash class="h-5 w-5" />
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="px-4 py-2 text-center text-sm text-gray-500">No se encontraron libros</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Paginación --}}
    <div class="pt-4">
      {{ $books->links() }}
    </div>
  </div>
</section>
@endsection
