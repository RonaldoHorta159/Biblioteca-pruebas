<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name','Library') }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-screen">
  <div class="grid h-full grid-cols-1 lg:grid-cols-3">

    {{-- LIBROS: ocupa 2/3, scroll solo al desbordar --}}
    <div class="lg:col-span-2 bg-white p-6 border-r border-gray-200 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent">
      <h2 class="text-2xl font-semibold mb-4">Nuestros libros</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @foreach($books as $book)
          <div class="bg-white border border-gray-100 rounded-lg shadow-sm p-4">
            <h3 class="text-lg font-medium text-gray-800 truncate">{{ $book->name }}</h3>
            <p class="text-sm text-gray-600 truncate">{{ $book->category->name }} &middot; {{ $book->auther->name }}</p>
            <span class="mt-2 inline-flex items-center text-xs font-medium {{ $book->status==='Y' ? 'text-green-600' : 'text-red-600' }}">
              {{ $book->status==='Y' ? 'Disponible' : 'Prestado' }}
            </span>
          </div>
        @endforeach
      </div>
    </div>

    {{-- LOGIN: ocupa 1/3, estático y optimizado UX/UI --}}
    <div class="bg-gray-50 p-6 flex items-center justify-center">
      <div class="w-full max-w-sm bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Iniciar sesión</h2>
        <form action="{{ route('login') }}" method="POST" class="space-y-6">
          @csrf
          <div>
            <input id="username" name="username" type="text" required
                   placeholder="Usuario"
                   class="w-full bg-gray-50 px-4 py-3 rounded-lg shadow-sm hover:bg-gray-100 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent placeholder-gray-400" />
            @error('username')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
          </div>
          <div>
            <input id="password" name="password" type="password" required
                   placeholder="Contraseña"
                   class="w-full bg-gray-50 px-4 py-3 rounded-lg shadow-sm hover:bg-gray-100 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent placeholder-gray-400" />
            @error('password')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
          </div>
          <button type="submit"
                  class="w-full flex justify-center rounded-lg bg-indigo-600 px-4 py-3 text-white font-semibold hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition duration-150 ease-in-out">
            Entrar
          </button>
        </form>
      </div>
    </div>

  </div>
</body>
</html>
