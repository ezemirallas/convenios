<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

	public function getRouteKeyName()
	{
		return "slug";
	}

    //Relación de muchos a muchos con Responsable
	public function responsables(){
		return $this->belongsToMany(Responsable::class);
	}

    // Relación uno a muchos
	public function contratosresponsable(){
		return $this->hasMany(Contrato::class,'arearesponsable_id');
	}

    // Relación uno a muchos
	public function contratosgenerador(){
		return $this->hasMany(Contrato::class,'areageneradora_id');
	}
}
