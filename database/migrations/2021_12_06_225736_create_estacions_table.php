<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_estacion');
            $table->string('provincia_localidad');
            $table->string('municipio');
            $table->integer('altura');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('latitud',10,8);
            $table->decimal('longitud',11,8);
            $table->string('imagen')->nullable();
            $table->string('tipo_estacion');
            $table->string('datos');
            $table->string('observaciones');
            $table->string('estado');
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
        Schema::dropIfExists('estacions');
    }
}
