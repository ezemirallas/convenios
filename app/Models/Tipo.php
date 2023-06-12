<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

	public function getRouteKeyName()
	{
		return "slug";
	}

    // Relación uno a muchos con Persona
	public function personas(){
		return $this->hasMany(Persona::class);
	}
}
