<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('area_responsable', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('area_id');
			$table->unsignedBigInteger('responsable_id');

			$table->foreign('area_id')
				->references('id')
				->on('areas')
				->onDelete('cascade');

			$table->foreign('responsable_id')
				->references('id')
				->on('responsables')
				->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('area_responsable');
    }
};
