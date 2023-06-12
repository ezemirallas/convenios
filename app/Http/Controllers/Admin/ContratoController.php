<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Models\Area;
use App\Models\Category;
use App\Models\Contrato;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContratoController extends Controller
{
    public function index()
    {
        return view('admin.contratos.index');
    }

    public function create()
    {
        $categories = Category::pluck('name','id');
        $areasgeneradoras = Area::pluck('name','id');
        $areasresponsables = Area::pluck('name','id');
        $personas = Persona::orderBy('id','ASC')->get()->pluck('cuit_and_name','id');
        $convenios = Contrato::orderBy('id','ASC')->get()->pluck('convenio','id');
        return view('admin.contratos.create',compact('categories','areasgeneradoras','areasresponsables','personas','convenios'));
    }

    public function store(ContratoRequest $request)
    {
        $contrato = Contrato::create($request->all());

        if($request->file('file')){
			$url = Storage::put('public/archivos',$request->file('file'));

			$contrato->file()->create([
				'url' => $url
			]);
		}

        if($request->file('image')){
			$urli = Storage::put('public/archivos',$request->file('image'));

			$contrato->image()->create([
				'url' => $urli
			]);
		}

        if($request->personas){
			$contrato->personas()->attach($request->personas);
		}

        if($request->convenios){
            $contrato->parent_id = $request->convenios;
            $contrato->save();
		}

		return redirect()->route('admin.contratos.edit',$contrato);
    }

    public function show(Contrato $contrato)
    {
        return view('admin.contratos.show',compact('contrato'));
    }

    public function edit(Contrato $contrato)
    {
        $categories = Category::pluck('name','id');
        $areasgeneradoras = Area::pluck('name','id');
        $areasresponsables = Area::pluck('name','id');
        $personas = Persona::orderBy('id','ASC')->get()->pluck('cuit_and_name','id');
        $convenios = Contrato::orderBy('id','ASC')->get()->pluck('convenio','id');
        return view('admin.contratos.edit',compact('contrato','categories','areasgeneradoras','areasresponsables','personas','convenios'));
    }

    public function update(UpdateContratoRequest $request, Contrato $contrato)
    {
        $contrato->update($request->all());

		if($request->file('file')){
			$url = Storage::put('public/archivos',$request->file('file'));

			if($contrato->file){
				Storage::delete($contrato->file->url);

				$contrato->file->update([
					'url' => $url
				]);
			} else {
				$contrato->file()->create([
					'url' => $url
				]);
			}
		}

        if($request->file('image')){
			$urli = Storage::put('public/archivos',$request->file('image'));

			if($contrato->image){
				Storage::delete($contrato->image->url);

				$contrato->image->update([
					'url' => $urli
				]);
			} else {
				$contrato->image()->create([
					'url' => $urli
				]);
			}
		}

        if($request->personas){
			$contrato->personas()->sync($request->personas);
		}

        if($request->convenios){
                $contrato->parent_id = $request->convenios;
                $contrato->save();
		}

		return redirect()->route('admin.contratos.edit', $contrato)->with('info',"El documento se actualizó con éxito");
    }

    public function destroy(Contrato $contrato)
    {
        $contrato->delete();

		return redirect()->route('admin.contratos.index', $contrato)->with('info',"El documento se eliminó con éxito");
    }
}
