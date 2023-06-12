<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContratoRequest extends FormRequest
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
        $rules = [
            'objeto' => "required",
            'fechainicio' => "required",
            'fechafinalizacion' => "required",
            'numeroresolucion' => "required",
            'anioresolucion' => "required|integer",
            'category_id' => "required",
            'personas' => "required",
            'parte_id' => "required",
            'areageneradora_id' => "required",
            'arearesponsable_id' => "required",
		];

        if( $this->category_id == 2 || $this->category_id == 3 ){
			$rules = array_merge($rules, [
				'convenios' => 'required',
			]);
		}

		return $rules;
    }
}
