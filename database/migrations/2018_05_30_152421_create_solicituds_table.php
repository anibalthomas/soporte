<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registrante')->nullable();
            $table->string('solicitante');
            $table->string('tipo');
            $table->string('prioridad');
            $table->mediumText('notas');
            // $table->string('notas_admin')->nullable();
            // $table->boolean('active')->default(false);
            $table->timestamps();
            $table->string('atiende')->nullable();
            $table->string('status')->nullable();
            $table->string('tiempo_inicio')->nullable();
            $table->string('tiempo_final')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
