<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->increments('id');
            //creando una tabla con llave foranea con la tabla rol
            $table->unsignedInteger('rol_id');
            $table->foreign('rol_id','fk_uruarioRol_rol')->references('id')->on('rol')->onDelete('restrict')->onUpdate('restrict');

            //creando la llave foranea con la tabla usuario usuario_id esta en la tabla usuario rol y va a hacer nuestro llave foranea
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id','fk_uruarioRol_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');

            $table->boolean('estado');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_rol');
    }
}
