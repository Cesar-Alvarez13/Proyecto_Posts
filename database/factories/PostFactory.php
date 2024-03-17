<?php

namespace Database\Factories;

// importando una clase especial para crear URL amigables por medio de texto
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // Define la estructura de archivos falsos
    
    public function definition(): array
    {
        return [
        // // Crear archivos falsos Parte 1:

        // // Se define un atributo ("title") el cual por medio del objeto $this->faker se genera una oracion falsa que se utilizara de titulo
        // "title"=> $this->faker->sentence(),

        // "slug"=> $this->faker->sentence(),
        // // Se define un atributo (body) el cual por medio del objeto $this->faker se genera una oracion falsa de 2200 caracteres que se utilizara de body
        // "body"=> $this->faker->text(2200),

        // Crear archivos falsos Parte 2: Aplicando la clase Str para la creacion de URL amigables por medio de texto
        
        //Definiendo valor que tendra mi user_id , en mi tabla
        'user_id' => 1,
        
        // Se define una variable llamada title la cual sera igual a la oracion falsa que se genere por medio del objeto $this->faker
        "title"=> $title = $this->faker->sentence(),
        
        // Por medio de la clase Str se crea por medio del titulo que ya nos lo da la anterior variable (title) para crear ese texto en
        // una URL mas amigable lo cual se genera un slug
        "slug"=> Str::slug($title),

        // Se define un atributo (body) el cual por medio del objeto $this->faker se genera una oracion falsa de 2200 caracteres que se utilizara de body
        "body"=> $this->faker->text(2200),
        ];
    }
}
