<?php

namespace App\Http\Controllers;

// Trabajar con el modelo post que trabaja con la tabla post
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //Manejo de peticiones o solicitudes,dejando de lado la logica de las rutas

    public function home(Request $request)
    {   
        $search = $request->search;

        // Muestra de forme los registros con paginacion
        $posts = Post::where('title', 'LIKE', "%{$search}%")->with('user')->latest()->paginate();

        /*retorna una vista llamada home*/
        return view('home', ['posts' => $posts]);
    }


    // Crea una funcion post para que por medio de ella se utilice el modelo y la variable post que hace referencia a la consulta de la base de datos por medio de un parametro
    public function post(Post $post)
    {   
        // retorna la vista post por medio del parametro recuperado de la vista a la base de datos para mostrar su informacion
        return view('post', ['post' => $post]);
    }
}
