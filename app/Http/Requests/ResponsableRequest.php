<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponsableRequest extends FormRequest
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
        $responsable = $this->route()->parameter('responsable');

        $rules = [
			'apellido' => "required",
			'nombre' => "required",
            'email' => "required|unique:responsables",
		];

        if($responsable){
            $rules = [
                'email' => "required|unique:responsables,email,".$responsable->id,
            ];
		}

		return $rules;
    }
}
