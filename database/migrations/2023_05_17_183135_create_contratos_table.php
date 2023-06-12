<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();

            $table->string('objeto')->nullable();
            $table->date('fechainicio');
            $table->date('fechafinalizacion');
            $table->text('observacion')->nullable();
            $table->integer('renovacionautomatica')->nullable();
            $table->string('numeroresolucion');
            $table->integer('anioresolucion');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('areageneradora_id');
            $table->unsignedBigInteger('arearesponsable_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('parte_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('areageneradora_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('arearesponsable_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('parte_id')->references('id')->on('personas')->onDelete('cascade');

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('contratos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
