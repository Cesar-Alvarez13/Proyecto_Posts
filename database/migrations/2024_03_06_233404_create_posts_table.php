<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // Se crea o actualiza la subida de tablas como migracion a la base de datos
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {

            // Tablas las cuales se crearan al migrarlas a nuestra base de datos
            $table->id();

            //Se crea una columna que espera un valor de tipo entero con el nombre user_id
            $table->unsignedBigInteger('user_id');

            // Se hace una relacion de los valores de user_id con respecto al id de la tabla usuarios
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('title');
            // Se define el campo de la tabla como unico
            $table->string('slug')->unique();
            $table->text('body');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    //  Se encarga de revertir la migracion de las tablas si asi se requiere
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
