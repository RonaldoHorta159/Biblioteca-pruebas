@extends('layouts.app')

@section('content')
    <section class="p-6 bg-gray-100 min-h-full overflow-auto">
        <div class="max-w-7xl mx-auto bg-white border border-gray-200 rounded-lg shadow p-6 space-y-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-gray-800">Estudiantes</h1>
                <a href="{{ route('student.create') }}"
                    class="inline-block rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">Agregar
                    estudiante</a>
            </div>

            <!-- Tabla de estudiantes -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">ID
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Nombre</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Género</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Teléfono</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Correo</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($students as $student)
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $student->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $student->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700 capitalize">{{ $student->gender }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $student->phone }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $student->email }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700 text-right space-x-2 whitespace-nowrap">
                                    <button data-sid="{{ $student->id }}"
                                        class="inline-block rounded-md bg-blue-500 px-3 py-1 text-white text-xs font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 view-btn">Ver</button>
                                    <a href="{{ route('student.edit', $student) }}"
                                        class="inline-block rounded-md bg-green-500 px-3 py-1 text-white text-xs font-medium hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Editar</a>
                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este estudiante?');">
                                        @csrf
                                        <button type="submit"
                                            class="inline-block rounded-md bg-red-500 px-3 py-1 text-white text-xs font-medium hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-sm text-gray-500">No se encontraron
                                    estudiantes</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="pt-4">
                {{ $students->links() }}
            </div>

            <!-- Modal de detalle -->
            <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
                <div id="modal-form" class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative">
                    <button id="close-btn" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">✕</button>
                    <table class="w-full text-sm text-gray-700" cellpadding="8">
                        <!-- Contenido cargado vía AJAX -->
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- Scripts de interacción --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script>
        // Mostrar detalles de estudiante
        $(document).on('click', '.view-btn', function () {
            var student_id = $(this).data('sid');
            $.get('/student/show/' + student_id, function (student) {
                var rows = '';
                $.each(student, function (key, value) {
                    rows += '<tr><td class="font-medium capitalize">' + key.replace('_', ' ') + ':</td><td>' + value + '</td></tr>';
                });
                $('#modal-form table').html(rows);
                $('#modal').removeClass('hidden').addClass('flex');
            });
        });
        // Cerrar modal
        $('#close-btn').on('click', function () {
            $('#modal').addClass('hidden').removeClass('flex');
        });
    </script>
@endsection