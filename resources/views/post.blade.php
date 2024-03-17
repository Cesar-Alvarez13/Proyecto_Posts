{{-- Directiva que extiende el archivo template --}}
@extends('template')

{{-- Directiva que define el inicio del contenido --}}
@section('content')

    <div class="max-w-3xl mx-auto bg-gray-100 rounded-lg">
        <h1 class="text-5xl  bg-gray-200 rounded-lg px-2 py-1 inline-block m-6 ">{{ $post->title }}</h1>
        
        <p class="leading-loose text-lg text-gray-700 text-justify mb-4 px-6 py-4">
            {!! nl2br(e($post->body)) !!}
        </p>

        <div class="flex justify-between items-center bg-gray-200 rounded-lg px-6 py-3">
            <div class="text-sx text-gray-900 opacity-75 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd" />
                </svg>
                {{ $post->user->name }}
            </div>

            <span>{{ $post->created_at->format('d/m/y') }}</span>
        </div>
    </div>

@endsection
