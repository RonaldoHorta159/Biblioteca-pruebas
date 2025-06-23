<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Sistema de Gestión') }}</title>

  {{-- Importar Tailwind CSS compilado --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  {{-- Heroicons como componentes Blade --}}
  {{-- Composer: composer require blade-ui-kit/blade-heroicons --}}

  {{-- Alpine.js para interactividad ligera --}}
  <script src="//unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  {{-- Scripts de la aplicación --}}
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="h-full">
  <div x-data="{
      sidebarOpen: JSON.parse(localStorage.getItem('sidebarOpen') || 'true')
    }"
    x-init="$watch('sidebarOpen', value => localStorage.setItem('sidebarOpen', value))"
    class="flex h-screen">

    <!-- Sidebar -->
    <aside x-show="sidebarOpen"
           class="w-64 bg-white border-r shadow-sm flex flex-col transform transition-transform duration-200 ease-in-out"
           x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
      <div class="h-16 flex items-center justify-center border-b">
        <a href="{{ route('dashboard') }}">
          <img src="{{ asset('images/logo-hub.svg') }}" alt="{{ config('app.name') }}" class="h-10 w-auto">
        </a>
      </div>
      <nav class="flex-1 px-4 py-6 overflow-y-auto">
        <ul class="space-y-2">
          <li>
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-home class="h-5 w-5 mr-2 text-gray-600" />
              Inicio
            </a>
          </li>
          <li>
            <a href="{{ route('authors') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('authors*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-user-group class="h-5 w-5 mr-2 text-gray-600" />
              Autores
            </a>
          </li>
          <li>
            <a href="{{ route('publishers') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('publishers*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-library class="h-5 w-5 mr-2 text-gray-600" />
              Editoriales
            </a>
          </li>
          <li>
            <a href="{{ route('categories') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('categories*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-cube class="h-5 w-5 mr-2 text-gray-600" />
              Categorías
            </a>
          </li>
          <li>
            <a href="{{ route('books') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('books*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-book-open class="h-5 w-5 mr-2 text-gray-600" />
              Libros
            </a>
          </li>
          <li>
            <a href="{{ route('students') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('students*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-academic-cap class="h-5 w-5 mr-2 text-gray-600" />
              Estudiantes
            </a>
          </li>
          <li>
            <a href="{{ route('book_issued') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('book_issued*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-check-circle class="h-5 w-5 mr-2 text-gray-600" />
              Préstamos
            </a>
          </li>
          <li>
            <a href="{{ route('reports') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('reports*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-chart-pie class="h-5 w-5 mr-2 text-gray-600" />
              Informes
            </a>
          </li>
          <li>
            <a href="{{ route('settings') }}" class="flex items-center px-3 py-2 rounded {{ request()->routeIs('settings*') ? 'bg-gray-200 font-semibold' : 'hover:bg-gray-100' }}">
              <x-heroicon-o-cog class="h-5 w-5 mr-2 text-gray-600" />
              Configuración
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden">

      <!-- Header -->
      <header class="flex items-center justify-between bg-white border-b px-6 py-4">
        <!-- Toggle sidebar button -->
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-700 focus:outline-none mr-4">
          <template x-if="!sidebarOpen">
            <x-heroicon-o-menu class="h-6 w-6" />
          </template>
          <template x-if="sidebarOpen">
            <x-heroicon-o-x class="h-6 w-6" />
          </template>
        </button>

        <div x-data="{ open: false }" class="relative">
          <button @click="open = !open" class="flex items-center text-gray-700 focus:outline-none">
            <span class="mr-2">Hola, {{ auth()->user()->name }}</span>
            <x-heroicon-o-chevron-down class="h-5 w-5 text-gray-600" />
          </button>
          <div x-show="open" @click.outside="open = false" x-transition class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
            <div class="py-1">
              <a href="{{ route('change_password') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Cambiar contraseña</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Cerrar sesión</button>
              </form>
            </div>
          </div>
        </div>
      </header>

      <!-- Page content -->
      <main class="flex-1 overflow-auto p-6">
        @yield('content')
      </main>

      <!-- Footer -->
      <footer class="bg-white border-t px-6 py-4 text-center text-sm text-gray-500">
        © {{ now()->year }} <a href="https://www.ucontinental.edu.pe" class="text-indigo-600 hover:underline">GRUPO D 😎</a>
      </footer>
    </div>
  </div>
</body>
</html>
