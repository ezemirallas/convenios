<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $guarded = ['id','create_at','updated_at'];

    public function getApellidoAndNombreAttribute()
    {
        return $this->apellido . ', ' . $this->nombre;
    }

    //Relación muchos a muchos con Areas
	public function areas(){
		return $this->belongsToMany(Area::class);
	}
}
