<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $guarded = ['id','create_at','updated_at'];

    public function getCuitAndNameAttribute()
    {
        return $this->cuit . ' | ' . $this->name;
    }

    //Relación de uno a muchos inversa con Tipo
    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    //Relación muchos a muchos con contratos
	public function contratos(){
		return $this->belongsToMany(Contrato::class);
	}
}
