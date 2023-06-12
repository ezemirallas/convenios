<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
                'name' => 'cristian.reta',
                'email'=> 'cristianreta2604@gmail.com',
                'password'=> bcrypt('Cr1qemsllda$75'),
            ])->assignRole('Admin');

        User::create([
                'name' => 'listados',
                'email'=> 'listados@gmail.com',
                'password'=> bcrypt('Cr1qemsllda$75'),
            ])->assignRole('Consulta de Listados');

        User::create([
                'name' => 'contratos',
                'email'=> 'contratos@gmail.com',
                'password'=> bcrypt('Cr1qemsllda$75'),
            ])->assignRole('crud contratos, adendas y prórrogas');
    }
}
