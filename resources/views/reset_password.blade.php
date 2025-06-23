@extends('layouts.app')

@section('content')
<section class="p-6 bg-gray-100 overflow-auto min-h-full">
  <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Cambiar contraseña</h1>
    <form action="{{ route('change_password') }}" method="POST" autocomplete="off" class="space-y-4">
      @csrf

      <div>
        <label for="c_password" class="block text-sm font-medium text-gray-700">Contraseña actual</label>
        <input id="c_password" name="c_password" type="password" required
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2
                      focus:outline-none focus:ring-indigo-600 focus:border-indigo-600" />
        @error('c_password')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Nueva contraseña</label>
        <input id="password" name="password" type="password" required
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2
                      focus:outline-none focus:ring-indigo-600 focus:border-indigo-600" />
        @error('password')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required
               class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2
                      focus:outline-none focus:ring-indigo-600 focus:border-indigo-600" />
      </div>

      <button type="submit"
              class="w-full flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white
                     hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        Actualizar
      </button>
    </form>
  </div>
</section>
@endsection
