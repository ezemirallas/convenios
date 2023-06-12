<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $guarded = ['id','create_at','updated_at'];

    public function getConvenioAttribute()
    {
        return '#Ref.:' . $this->id . ' | ' . $this->objeto . ' | [' . $this->fechainicio . ' | ' . $this->fechafinalizacion . ']';
    }

    //Relación de uno a muchos inversa con Users
	public function user(){
		return $this->belongsTo(User::class);
	}

    //Relación de muchos a muchos con Personas
	public function personas(){
		return $this->belongsToMany(Persona::class);
	}

    //Relación de uno a muchos inversa
	public function areageneradora(){
		return $this->belongsTo(Area::class,'areageneradora_id');
	}

    //Relación de uno a muchos inversa
	public function arearesponsable(){
		return $this->belongsTo(Area::class,'arearesponsable_id');
	}

    //Relación uno a uno polimorfica
	public function file(){
		return $this->morphOne(File::class,'fileable');
	}

    //Obtener el padre del contrato
    public function parent(){
        return $this->belongsTo(Contrato::class);
    }

    //Obtener todos los contratos del contrato
    public function contratos(){
        return $this->hasMany(Contrato::class, 'parent_id');
    }

    //Relación de uno a muchos inversa
	public function category(){
		return $this->belongsTo(Category::class);
	}

    //Relación de uno a muchos inversa
	public function parte(){
		return $this->belongsTo(Persona::class);
	}

	//Relación uno a uno polimorfica
	public function image(){
		return $this->morphOne(Image::class,'imageable');
	}

}
