<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroPrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_prestamo', function (Blueprint $table) {
            $table->increments('id');

              //llave foranea con la tabla libro_prestamo con la tabla usuario
              $table->unsignedInteger('usuario_id');
              $table->foreign('usuario_id','fk_libro_prestamo_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');

              //creando la llave foranea de la tablalibro_prestamo con libro
              $table->unsignedInteger('libro_id');
              $table->foreign('libro_id','fk_libro_prestamo_libro')-> references('id')->on('libro')->onDelete('restrict')->onUpdate('restrict');

              $table->date('fecha_prestamo');
              $table->string('prestado_a',100);
              $table->boolean('estado');
              $table->date('fecha_devolucion')->nullable();

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
        Schema::dropIfExists('libro_prestamo');
    }
}
