@extends('layouts.app')

@section('content')
    <div id="admin-content" class="max-w-3xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Actualizar Estudiante</h2>

        <form action="{{ route('student.update', $student->id) }}" method="POST" autocomplete="off"
            class="space-y-6 bg-white p-6 rounded-lg shadow">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-gray-700 mb-1">Nombre</label>
                <input type="text" name="name" value="{{ $student->name }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address --}}
            <div>
                <label class="block text-gray-700 mb-1">Dirección</label>
                <input type="text" name="address" value="{{ $student->address }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gender --}}
            <div>
                <label class="block text-gray-700 mb-1">Género</label>
                <select name="gender"
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Class --}}
            <div>
                <label class="block text-gray-700 mb-1">Clase</label>
                <input type="text" name="class" value="{{ $student->class }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('class')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Age --}}
            <div>
                <label class="block text-gray-700 mb-1">Edad</label>
                <input type="number" name="age" value="{{ $student->age }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('age')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label class="block text-gray-700 mb-1">Teléfono</label>
                <input type="tel" name="phone" value="{{ $student->phone }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-gray-700 mb-1">Correo</label>
                <input type="email" name="email" value="{{ $student->email }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection