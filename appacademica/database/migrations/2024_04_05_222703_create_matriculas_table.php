<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('matriculas', function (Blueprint $table) {
        $table->id();
        $table->string('codigo');
        $table->foreignId('estudiante_id')->constrained()->onDelete('cascade');
        $table->string('ciclo');
        $table->date('fecha_matricula');
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
        Schema::dropIfExists('matriculas');
    }
};
