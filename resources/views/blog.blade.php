{{-- Directiva que extiende el archivo template --}}
@extends('template')

{{-- Directiva que define el inicio del contenido --}}
@section('content')
    <h1>Listado</h1>

    {{-- Directiva blade la cual como su nombre lo indica es un foreach el cual recorrera el arreglo que se mando a la pagina con nombre $posts desde el archivo rutas,
y $post que es el valor que tomara cada variable del arreglo --}}

    @foreach ($posts as $post)
        <p>
            {{-- Muestra el valor de la propiedad id --}}
            <strong>{{ $post->id }}</strong>

            {{-- Crea una URL con respecto al nombre de la ruta y por medio de una variable manda el parametro esperado --}}
            <a href="{{ route('post', $post->slug) }}">

                {{-- Muestra el valor de la propiedad title --}}
                {{ $post->title }}
            </a>

            <br>

            {{-- Por medio del post traete el nombre del dueno de la publicacion --}}
            <span>{{ $post->user->name}}</span>
        </p>
    @endforeach

    {{ $posts->links() }}
@endsection
