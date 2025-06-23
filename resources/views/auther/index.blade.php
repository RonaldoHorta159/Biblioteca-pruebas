@extends('layouts.app')

@section('content')
<section class="p-6 bg-gray-100 min-h-full overflow-auto">
  <div class="max-w-7xl mx-auto bg-white border border-gray-200 rounded-lg shadow p-6 space-y-6">
    {{-- Encabezado con título y botón --}}
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-semibold text-gray-800">Todos los autores</h1>
      <a href="{{ route('authors.create') }}" class="inline-block rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">Agregar autor</a>
    </div>

    {{-- Tabla de autores --}}
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nombre del autor</th>
            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($authors as $author)
            <tr>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $author->id }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $author->name }}</td>
              <td class="px-4 py-2 text-sm text-gray-700 text-right space-x-2">
                <a href="{{ route('authors.edit', $author) }}" class="inline-block rounded-md bg-green-500 px-3 py-1 text-white text-xs font-medium hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Editar</a>
                <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este autor?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="inline-block rounded-md bg-red-500 px-3 py-1 text-white text-xs font-medium hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-4 py-2 text-center text-sm text-gray-500">No se encontraron autores</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Paginación --}}
    <div class="pt-4">
      {{ $authors->links() }}
    </div>
  </div>
</section>
@endsection
