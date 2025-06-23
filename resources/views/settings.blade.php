@extends('layouts.app')

@section('content')
<section class="p-6 bg-gray-100 min-h-full overflow-auto">
  <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Ajustes</h1>
    <form action="{{ route('settings') }}" method="POST" autocomplete="off" class="space-y-4">
      @csrf

      <div>
        <label for="return_days" class="block text-sm font-medium text-gray-700">Días de devolución</label>
        <input id="return_days" name="return_days" type="number" required value="{{ $data->return_days }}" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600" />
        @error('return_days')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="fine" class="block text-sm font-medium text-gray-700">Multa (en S/.)</label>
        <input id="fine" name="fine" type="number" required value="{{ $data->fine }}" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-600 focus:border-indigo-600" />
        @error('fine')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
      </div>

      <button type="submit" class="w-full flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        Actualizar
      </button>
    </form>
  </div>
</section>
@endsection
