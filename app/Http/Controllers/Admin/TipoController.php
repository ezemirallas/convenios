<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
		return view('admin.tipos.index',compact('tipos'));
    }

    public function create()
    {
        return view('admin.tipos.create');
    }

    public function store(Request $request)
    {
		$request->validate([
			'name' => 'required',
			'slug' => 'required|unique:tipos'
		]);
		$tipo = Tipo::create($request->all());

		return redirect()->route('admin.tipos.edit', $tipo)->with('info','La clase de persona se creó con éxito');
    }

    public function show(Tipo $tipo)
    {
        return view('admin.tipos.show',compact('tipo'));
    }

    public function edit(Tipo $tipo)
    {
        return view('admin.tipos.edit',compact('tipo'));
    }

    public function update(Request $request, Tipo $tipo)
    {
		$request->validate([
			'name' => 'required',
			'slug' => "required|unique:tipos,slug,$tipo->id"
		]);
		$tipo->update($request->all());

		return redirect()->route('admin.tipos.edit',$tipo)->with('info','La clase de persona se actualizó con éxito');
    }

    public function destroy(Tipo $tipo)
    {
		$tipo->delete();

		return redirect()->route('admin.tipos.index')->with('info','La clase de persona se eliminó con éxito');
    }
}
