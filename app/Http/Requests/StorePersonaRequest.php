<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonaRequest extends FormRequest
{
    public function authorize(): bool
    {
        if($this->user_id == auth()->user()->id){
			return true;
		} else {
			return false;
		}
    }

    public function rules(): array
    {

        $persona = $this->route()->parameter('persona');

        $rules = [
			'name' => "required",
			'cuit' => "required|unique:personas",
            'email' => "required|unique:personas",
			'domicilio' => "required",
		];

        if($persona){
            $rules = [
                'cuit' => "required|unique:personas,cuit,".$persona->id,
                'email' => "required|unique:personas,email,".$persona->id,
            ];
		}

		return $rules;
    }
}
