<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('posts.store')}}" method="POST">
                        {{-- Se incluye una vista que se encuentra en la carpeta posts, nombrada _form que sera el formulario de creacion o para editar --}}
                    @include('posts._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
