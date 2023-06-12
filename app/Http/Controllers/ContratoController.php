<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Category;
use App\Models\Contrato;
use App\Models\Persona;

use function GuzzleHttp\Promise\all;

class ContratoController extends Controller
{
    public function index(){
		return view('contratos.index');
	}

    public function show(Contrato $contrato){
		$similares = Contrato::where('category_id', $contrato->category_id)
				->where('id','!=',$contrato->id)
				->latest('id')
				->take(4)
				->get();

		return view('contratos.show',compact('contrato','similares'));
	}

    public function category(Category $category){
		$contratos = Contrato::where('category_id', $category->id)
				->latest('id')
				->paginate(4);
		return view('contratos.category',compact('contratos','category'));
	}
}
