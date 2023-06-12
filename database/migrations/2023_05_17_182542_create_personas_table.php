<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('cuit',20);
            $table->text('domicilio');
            $table->string('email');

            $table->unsignedBigInteger('tipo_id');

            $table->foreign('tipo_id')
                    ->references('id')
                    ->on('tipos')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
