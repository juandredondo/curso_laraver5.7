<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreatePermisoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_rol', function (Blueprint $table) {
            $table->increments('id');

            //llave foranea con la tabla permiso
            $table->unsignedInteger('rol_id');
            $table->foreign('rol_id','fk_permiso_rol_rol')->references('id')->on('rol')->onDelete('restrict')->onUpdate('restrict');

            //llave foranea con la tabla rol
            $table->unsignedInteger('permiso_id');
            $table->foreign('permiso_id','fk_permiso_rol_permiso')->references('id')->on('permiso')->onDelete('restrict')->onUpdate('restrict');



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
        Schema::dropIfExists('permiso_rol');
    }
}
