<?php

namespace App\Http\Controllers;

// importar modelo
use App\Models\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // Retorna una vista alojada en la carpeta posts llamada index y has una consulta a la tabla pos medio de su metodo por paginacion
        return view("posts.index", ['posts' => Post::latest()->paginate()]);
    }


    // Crea una funcion create para que se pueda crear nuevos post por medio de retornar un la vista como formulario
    public function create(Post $post)
    {
        // Retorna una vista que se encuenta en la carpeta posts y el archivo se llamada create el cual mostrara un formulario para crear un nuevo registro
        return view("posts.create", ['post' => $post]);
    }

    // Recupera lo que envia un usuario por medio de la clase request utilizando como parametro request
    public function store(Request $request)
    {
        // Validar contenido que se ingresara a la base de datos
        $request->validate([
            // Por medio del nombre que se puso a los @error has la validacion de requerimiento
            'title' => 'required',
            // Valida el slug mientras sea unico en la tabla posts
            'slug' => 'required | unique:posts,slug',
            'body' => 'required',
        ]);

        // Desarrolla una variable que sera igual a una nueva publicacion ingresada por el usuario que esta logiado y por medio de un metodo posts en el modulo User crear el post en la base de datos
        $post = $request->user()->posts()->create([
            // Por medio de request se optiene el titulo ingresado por el usuario
            'title' => $request->title,

            'slug' => $request->slug,
            // Por medio de request recuperamos el cuerpo del post
            'body' => $request->body,
        ]);

        // Se retorna una redireccion a la ruta de edit, y pasa como parametro el registro que se obtuvo 
        return redirect()->route('posts.edit', $post);
    }


    // Crea una funcion editar para que por medio del la vista se recupere el parametro post seleccionado
    public function edit(Post $post)
    {
        // Retorna una vista que se encuenta en la carpeta posts y el archivo se llamada edit el cual mostrara el post seleccionado para ser editado
        return view("posts.edit", ['post' => $post]);
    }
    public function update(Request $request, Post $post)
    {

        // Validar contenido recuperado para actualizar a la base de datos
        $request->validate([
            'title' => 'required',
            // Valida el slug mientras sea unico en la tabla posts, pero omitelo si este se esta trabajando con el mismo registro
            'slug' => 'required | unique:posts,slug,'.$post->id,
            'body' => 'required',
        ]);

        // Desarrolla una variable que sera igual a una nueva publicacion ingresada por el usuario que esta logiado y por medio de un metodo posts en el modulo User crear el post en la base de datos
        $post->update([
            // Por medio de request se optiene el titulo ingresado por el usuario
            'title' => $request->title,
            // Por medio de la clase Str se crea una URL amigable por medio del titulo recuperado
            'slug' => $request->slug,
            // Por medio de request recuperamos el cuerpo del post
            'body' => $request->body,
        ]);

        // Se retorna una redireccion a la ruta de edit, y pasa como parametro el registro que se obtuvo 
        return redirect()->route('posts.edit', $post);
    }

    // Crear una funcion el cual se utilice para eliminar el post mostrado en la tabla
    // haciendo uso del modelo Post que hace referencia a la tabla posts, utilizando un parametro para proceder a la eliminacion del post 
    public function destroy(Post $post)
    {
        // El post seleccionado o mandado como parametro por el usuario se eliminara por medio del metodo delete
        $post->delete();
        return back();
    }
}
