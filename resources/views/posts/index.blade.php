<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Posts') }}
            {{-- Crea una celda con el aparatdo Crear --}}
            <a href="{{ route('posts.create') }}" class="text-xs bg-gray-800 text-white rounded px-3 py-2">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Agrega un estilo a la tabla --}}
                    <table class="mb-4">
                        {{-- recorre la informacion consultada de la base de datos por un foreach utilizando la variable post --}}
                        @foreach ($posts as $post)
                            {{-- Estilo a las filas de la tabla --}}
                            <tr class="border-b border-gray-200 text-sm">
                                {{-- Agrega un estilo a las tablas y utiliza el titulo que se mostrara en cada celda --}}
                                <td class="px-6 py-4">{{ $post->title }}</td>
                                {{-- crea una cenlda con el apartado editar --}}
                                <td class="px-6 py-4"><a href="{{ route('posts.edit', $post) }}"
                                        class="text-indigo-600">Editar</a></td>

                                {{-- Crea una celda con el aparatdo borrar
                                <td class="px-6 py-4">Eliminar</td> --}}

                                <td class="px-6 py-4">
                                    {{-- Crea un formulario haciendo uso del metodo Post apuntando a la ruta de eliminar y espera como parametro su post con respecto a la base de datos --}}
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        {{-- hacer seguro el formulario generando un token de seguridad --}}
                                        @csrf
                                        {{-- Espesificar el metodo por el cual se enviara el formulario el cual eliminara recursos de la base de datos --}}
                                        @method('DELETE')
                                        {{-- Crea un boton el cual tenga el valor eliminar con clases de diseno y al precionar retorne una vista de confirmacion --}}
                                        <input type="submit" value="Eliminar"
                                            class="bg-gray-800 text-white rounded px-4 py-2"
                                            onclick="return confirm('Desea eliminar?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
