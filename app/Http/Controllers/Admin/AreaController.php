<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Responsable;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
		return view('admin.areas.index',compact('areas'));
    }

    public function create()
    {
        //responsables = Responsable::select(DB::raw("CONCAT(responsables.apellido,', ',responsables.nombre) as name"),"responsables.id as id")->get();
        //$responsables = Responsable::pluck('apellido','id');
        $responsables = Responsable::orderBy('id','ASC')->get()->pluck('apellido_and_nombre','id');
        return view('admin.areas.create',compact('responsables'));
    }

    public function store(Request $request)
    {
        $request->validate([
			'name' => 'required',
			'slug' => 'required|unique:areas'
		]);
		$area = Area::create($request->all());

        if($request->responsables){
			$area->responsables()->sync($request->responsables);
		}

		return redirect()->route('admin.areas.edit', $area)->with('info','El área se creó con éxito');
    }

    public function show(Area $area)
    {
        return view('admin.areas.show',compact('area'));
    }

    public function edit(Area $area)
    {
        //$responsables = Responsable::pluck('apellido','id');
        $responsables = Responsable::orderBy('id','ASC')->get()->pluck('apellido_and_nombre','id');
        return view('admin.areas.edit',compact('area','responsables'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
			'name' => 'required',
			'slug' => "required|unique:areas,slug,$area->id"
		]);
		$area->update($request->all());

        if($request->responsables){
			$area->responsables()->sync($request->responsables);
		}

		return redirect()->route('admin.areas.edit',$area)->with('info','El área se actualizó con éxito');
    }

    public function destroy(Area $area)
    {
		$area->delete();

		return redirect()->route('admin.areas.index')->with('info','El área se eliminó con éxito');
    }
}
