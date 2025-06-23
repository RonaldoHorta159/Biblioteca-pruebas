@extends('layouts.app')

@section('content')
<section class="p-6 bg-gray-100 min-h-full overflow-auto">
  <div class="max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow p-6 space-y-6">
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-semibold text-gray-800">Agregar editorial</h1>
      <a href="{{ route('publishers') }}" class="text-indigo-600 hover:underline">Todas las editoriales</a>
    </div>

    <form action="{{ route('publisher.store') }}" method="POST" autocomplete="off" class="space-y-4">
      @csrf

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la editorial</label>
        <input id="name" name="name" type="text" required placeholder="Nombre de la editorial"
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 @error('name') border-red-600 @enderror"
               value="{{ old('name') }}">
        @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <button type="submit" class="w-full flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        Guardar
      </button>
    </form>
  </div>
</section>
@endsection
