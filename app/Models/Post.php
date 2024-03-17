<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Se configura el modelo para mandar los 3 datos a la abse de datos
    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    public function user(){
        // Establece una relacion entre el modelo actual y el modelo User
        return $this->belongsTo(User::class);
    }
}
