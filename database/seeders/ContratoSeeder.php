<?php

namespace Database\Seeders;

use App\Models\Contrato;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    public function run(): void
    {
        $contratos = Contrato::factory(15)->create();
		foreach ($contratos as $contrato) {
            Image::factory(1)->create([
				'imageable_id' => $contrato->id,
				'imageable_type' => Contrato::class,
			]);
			$contrato->personas()->attach([
				rand(1,5),
				rand(1,5),
			]);
            \App\Models\File::create(['url' => 'archivos/Laravel 10 - Admin LTE.pdf', 'fileable_id' => $contrato->id, 'fileable_type' => 'App\Models\Contrato']);
		}
    }
}
