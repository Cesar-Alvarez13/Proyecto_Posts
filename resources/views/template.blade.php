<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyect Web</title>

    {{-- Importando estilos y scripsts desde la directiva Vite espesificando sus rutas  --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Crear contenedor para colocar el heder --}}
    <div class="container px-4 mx-auto">
        {{-- Header el cual tendra el logo una barra de busqueda y el aparatado de login --}}
        <header class="flex justify-between items-center py-4 gap-4">
            {{-- Contenedor el cual el logo y la barra de busqueda --}}
            <div class="flex items-center flex-grow gap-4">
                {{-- route genera una url con respecto al nombre que se le dio a cada ruta, en este caso hace referencia a home y a blog --}}
                <a href="{{ route('home') }}">
                    {{-- accediendo a la carpeta de recursos de imagenes por medio de php --}}
                    <img src="{{ asset('image/tiburon.png') }}" class="h-12">
                </a>
                {{-- barra de busqueda por formulario --}}
                <form action="{{ route('home') }}" method="GET" class="flex-grow">
                    <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}"
                        class="border border-gray-200 rounded-full py-2 px-6 w-full">
                </form>
            </div>

            {{-- Si el usuario esta autenticado muestra el siguiente enlace que lo dirigira al dashboard --}}
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Registrar</a>

            @endauth

        </header>

        <div class="opacity-60 h-px mb-8"
            style="background: linear-gradient(to right,
        rgba(200, 200, 200, 0) 0%,
        rgba(200, 200, 200, 1) 30%,
        rgba(200, 200, 200, 1) 70%,
        rgba(200, 200, 200, 0) 100%
        );
        ">

        </div>
        <!--Directiva definida como content la cual mostrara el demas contenido de las distintas vistas a partir de esta seccion-->
        @yield('content')
        <p class="py-16">
            <img src="{{ asset('image/logo_tiburon.png') }}" class="h-12 mx-auto">
        </p>
    </div>
</body>

</html>
