@extends('layouts.app')

@section('content')
<section class="p-6 bg-gray-100 min-h-full overflow-auto">
  <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow p-6 space-y-6">
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-semibold text-gray-800">Agregar estudiante</h1>
      <a href="{{ route('students') }}" class="text-indigo-600 hover:underline">Todos los estudiantes</a>
    </div>

    <form action="{{ route('student.store') }}" method="POST" autocomplete="off" class="space-y-4">
      @csrf

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input id="name" name="name" type="text" required placeholder="Nombre"
               value="{{ old('name') }}"
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('name') border-red-600 @enderror">
        @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
        <input id="address" name="address" type="text" required placeholder="Dirección"
               value="{{ old('address') }}"
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('address') border-red-600 @enderror">
        @error('address')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="gender" class="block text-sm font-medium text-gray-700">Género</label>
        <select id="gender" name="gender" required
                class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('gender') border-red-600 @enderror">
          <option value="male" {{ old('gender')=='male'? 'selected':'' }}>Masculino</option>
          <option value="female" {{ old('gender')=='female'? 'selected':'' }}>Femenino</option>
        </select>
        @error('gender')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="class" class="block text-sm font-medium text-gray-700">Clase</label>
        <input id="class" name="class" type="text" required placeholder="Clase"
               value="{{ old('class') }}"
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('class') border-red-600 @enderror">
        @error('class')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="age" class="block text-sm font-medium text-gray-700">Edad</label>
        <input id="age" name="age" type="number" required placeholder="Edad"
               value="{{ old('age') }}"
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('age') border-red-600 @enderror">
        @error('age')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
        <input id="phone" name="phone" type="tel" required placeholder="Teléfono"
               value="{{ old('phone') }}"
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('phone') border-red-600 @enderror">
        @error('phone')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
        <input id="email" name="email" type="email" required placeholder="Correo electrónico"
               value="{{ old('email') }}"
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('email') border-red-600 @enderror">
        @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <button type="submit" class="w-full flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        Guardar
      </button>
    </form>
  </div>
</section>
@endsection
