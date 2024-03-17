@csrf
{{-- Crea un formulario en base a la vista edit y create --}}
<label class="uppercase text-gray-700 text-xs">Titulo</label>
{{-- Crea un feedback con respecto al ingresar datos en el apartado titulo --}}
<span class="text-xs text-red-600"> @error('title') {{ $message }}@enderror</span>

{{-- Imput de tipo texto que mostrara titulo del post seleccionado --}}
{{-- Recuperar titulo antiguo por medio de una funcion  y si no tienes imprime lo que se esta recuperando de la base de datos --}}
<input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{ old('title', $post->title) }}">

{{-- Crear un formulario para definir el slug del post --}}
<label class="uppercase text-gray-700 text-xs">Slug</label>
{{-- Crea un spam para validar si hay un error con repecto al slug ingresado --}}
<span class="text-xs text-red-600"> @error('slug') {{ $message }}@enderror</span>
{{-- Guarda el valor ingresado en el imput por medio de una funcion y relacionalo con respecto al envio del apartado de la tabla --}}
<input type="text" name="slug" class="rounded border-gray-200 w-full mb-4" value="{{ old('slug', $post->slug) }}">


<label class="uppercase text-gray-700 text-xs">Contenido</label>

{{-- Crea un feedback con respecto al ingresar datos en el apartado body --}}
<span class="text-xs text-red-600"> @error('body')
        {{ $message }}
    @enderror
</span>

{{-- TextArea el cual  moestara el cuerpo del post seleccionado --}}
<textarea name="body" rows="7" class="rounded border-gray-200 w-full mb-4 " >{{ old('body',$post->body) }}</textarea>

{{-- Contenedor el cual contiene al boton volver y enviar  --}}
<div class="flex justify-between items-center">
    {{-- Por medio de un href se utiliza para crear una direccion hacia la vista index --}}
    <a href="{{ route('posts.index') }}" class="text-indigo-600">Volver</a>
    {{-- Por medio de un boton de tipo submit (Envia formularios) enviara la informacion que se guardara o enviara a la base de datos --}}
    <input type="submit" value="Enviar" class="bg-gray-800 text-white reunded px-4 py-2">
</div>
