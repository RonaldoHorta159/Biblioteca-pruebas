@extends('layouts.app')
@section('content')
    <div id="admin-content" class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center mb-6">
                <div class="w-full md:w-1/4">
                    <h2 class="text-2xl font-bold text-gray-800">Todos los préstamos de libros</h2>
                </div>
                <div class="w-full md:w-1/4 md:ml-auto text-right">
                    <a class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition"
                        href="{{ route('book_issue.create') }}">Agregar préstamo</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="py-2 px-3 border-b">N°</th>
                            <th class="py-2 px-3 border-b">Nombre</th>
                            <th class="py-2 px-3 border-b">Libro</th>
                            <th class="py-2 px-3 border-b">Teléfono</th>
                            <th class="py-2 px-3 border-b">Correo</th>
                            <th class="py-2 px-3 border-b">Fecha de préstamo</th>
                            <th class="py-2 px-3 border-b">Fecha de devolución</th>
                            <th class="py-2 px-3 border-b">Estado</th>
                            <th class="py-2 px-3 border-b">Editar</th>
                            <th class="py-2 px-3 border-b">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr
                                @if (date('Y-m-d') > $book->return_date->format('Y-m-d') && $book->issue_status == 'N')
                                    class="bg-red-100"
                                @endif
                            >
                                <td class="py-2 px-3 border-b">{{ $book->id }}</td>
                                <td class="py-2 px-3 border-b">{{ $book->student->name }}</td>
                                <td class="py-2 px-3 border-b">{{ $book->book->name }}</td>
                                <td class="py-2 px-3 border-b">{{ $book->student->phone }}</td>
                                <td class="py-2 px-3 border-b">{{ $book->student->email }}</td>
                                <td class="py-2 px-3 border-b">{{ $book->issue_date->format('d M, Y') }}</td>
                                <td class="py-2 px-3 border-b">{{ $book->return_date->format('d M, Y') }}</td>
                                <td class="py-2 px-3 border-b">
                                    @if ($book->issue_status == 'Y')
                                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-semibold">Devuelto</span>
                                    @else
                                        <span class="inline-block bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full font-semibold">Prestado</span>
                                    @endif
                                </td>
                                <td class="py-2 px-3 border-b text-center">
                                    <a href="{{ route('book_issue.edit', $book->id) }}"
                                        class="inline-block bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition">Editar</a>
                                </td>
                                <td class="py-2 px-3 border-b text-center">
                                    <form action="{{ route('book_issue.destroy', $book) }}" method="post" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition"
                                            onclick="return confirm('¿Estás seguro de eliminar este préstamo?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="py-4 text-center text-gray-500">No hay libros prestados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $books->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
