<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Persona;
use App\Models\Responsable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        //Storage::deleteDirectory('archivos');
		//Storage::makeDirectory('archivos');

        $name = "Persona Física";
        \App\Models\Tipo::factory()->create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Persona Jurídica";
        \App\Models\Tipo::factory()->create(['name' =>  $name, 'slug' => Str::slug($name)]);

        \App\Models\Persona::create([
			'name' => 'Hospital Universitario',
            'cuit' => '30-71411967-9',
            'domicilio' => 'Paso de los Andes 3051',
            'email' => 'hospital@hospital.uncu.edu.ar',
            'tipo_id' => 2,
		]);

         Persona::factory(10)->create();

        /* \App\Models\User::create([
			'name' => 'cristian.reta',
			'password' => bcrypt('Cr1qemsllda$75'),
			'email' => 'cristianreta2604@gmail.com'
		]);
        \App\Models\User::create([
			'name' => 'prueba.prueba',
			'password' => bcrypt('Cr1qemsllda$75'),
			'email' => 'prueba2604@gmail.com'
		]);*/

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $name = "Dirección General";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Dirección Académica";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Dirección Asistencial";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Dirección Administrativa";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Laboratorio";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Anatomía Patológica";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Tecnología Biomédica";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Odontología";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Patrimonio";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Coordinación Económica Financiera";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Comercialización";
        \App\Models\Area::create(['name' => $name, 'slug' => Str::slug($name)]);

        \App\Models\Responsable::create(['apellido' => 'risso patrón','nombre' => 'conrado','email' => 'conrado@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'andino','nombre' => 'mariana','email' => 'mariana.andino@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'nalda','nombre' => 'gonzalo','email' => 'gonzalo.nalda@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'andreoli','nombre' => 'nicolena','email' => 'nicolena.andrioli@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'civico','nombre' => 'gustavo','email' => 'gustavo.civico@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'fragberg','nombre' => 'walter','email' => 'walter.fragberg@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'fuentes','nombre' => 'melisa','email' => 'melisa.fuentes@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'encargado','nombre' => 'laboratorio','email' => 'encargado.laboratorio@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'encargado','nombre' => 'anatomia','email' => 'encargado.anatomia@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'encargado','nombre' => 'tecnologia','email' => 'encargado.tecnologia@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'encargado','nombre' => 'odontologia','email' => 'encargado.tecnologia@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'encargado','nombre' => 'patrimonio','email' => 'encargado.patrimonio@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'economica','nombre' => 'financiera','email' => 'economica.financiera@hospital.uncu.edu.ar']);
        \App\Models\Responsable::create(['apellido' => 'encargado','nombre' => 'comercialización','email' => 'encargado.comercializacion@hospital.uncu.edu.ar']);

        Responsable::factory(100)->create();

        $areas = Area::all();
		foreach ($areas as $area) {
            if($area->id == 1){
                $area->responsables()->attach([1]);
                $area->responsables()->attach([2]);
            }
            if($area->id == 2){
                $area->responsables()->attach([3]);
                $area->responsables()->attach([4]);
            }
            if($area->id == 3){
                $area->responsables()->attach([5]);
            }
            if($area->id == 4){
                $area->responsables()->attach([6]);
                $area->responsables()->attach([7]);
            }
            if($area->id == 5){
                $area->responsables()->attach([8]);
            }
            if($area->id == 6){
                $area->responsables()->attach([9]);
            }
            if($area->id == 7){
                $area->responsables()->attach([10]);
            }
            if($area->id == 8){
                $area->responsables()->attach([11]);
            }
            if($area->id == 9){
                $area->responsables()->attach([12]);
            }
            if($area->id == 10){
                $area->responsables()->attach([13]);
            }
            if($area->id == 11){
                $area->responsables()->attach([14]);
            }
		}

        //$name = $this->faker->unique()->word(20);

        $name = "Contrato";
        \App\Models\Category::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Addenda";
        \App\Models\Category::create(['name' => $name, 'slug' => Str::slug($name)]);
        $name = "Prórroga";
        \App\Models\Category::create(['name' => $name, 'slug' => Str::slug($name)]);

        $this->call(ContratoSeeder::class);

    }
}
