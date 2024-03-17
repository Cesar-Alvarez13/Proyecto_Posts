{{-- Directiva que extiende el archivo template --}}
@extends('template')

{{-- Directiva que define el inicio del contenido --}}
@section('content')
    <div class=" px-20 py-16 rounded-lg mb-8 relative overflow-hidden bg-center bg-no-repeat bg-cover h-64 w-64" style="background-image: url('{{ asset('image/fondo1.jpg') }}');">
        {{-- Destacada --}}
        <span class="text-sx uppercase text-gray-700 bg-gray-400 rounded-full px-2 py-1">Programacion Laravel</span>
        <h1 class="text-3xl text-white mt-4">Posts</h1>
        <p class="flex text-sm text-gray-200 mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                    clip-rule="evenodd" />
            </svg> 
            Cesar Emmanuel Alvarez Morales
        </p>
        <img src="{{ asset('image/dev.png') }}" class="absolute -right-20 -bottom-20 opacity-20">
    </div>

    <div class="px-4">
        <h1 class="text-2xl mb-8 text-gray-900">Contenido</h1>

        <div class="grid grid-cols-1 gap-4 mb-4 ">
            @foreach ($posts as $post)

                <a href="{{ route('post', $post->slug) }}" class="bg-gray-100 rounded-lg px-6 py-4">

                    <p class="text-sx flex items-center gap-2">
                        <span class="uppercase text-gray-700 bg-gray-200 rounded-full px-2 py-1">{{ $post->title }}</span>
                        <span>{{ $post->created_at->format('d/m/y') }}</span>
                    </p>
                    
                    <h2 class="text-lg text-gray-900 mt-2 overflow-hidden whitespace-nowrap">  {{ Str::words($post->body, 23, '...') }}</h2>

                    <div class="text-sx text-gray-900 opacity-75 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                clip-rule="evenodd" />
                        </svg>

                        {{ $post->user->name }}
                    </div>
                </a>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
@endsection
