<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonaRequest;
use App\Models\Persona;
use App\Models\Tipo;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        return view('admin.personas.index');
    }

    public function create()
    {
        $tipos = Tipo::pluck('name','id');

		return view('admin.personas.create',compact('tipos'));
    }

    public function store(StorePersonaRequest $request)
    {
        $persona = Persona::create($request->all());

		return redirect()->route('admin.personas.edit',$persona)->with('info',"La persona se creó con éxito");
    }

    public function show(Persona $persona)
    {
        return view('admin.personas.show',compact('persona'));
    }

    public function edit(Persona $persona)
    {
        $tipos = Tipo::pluck('name','id');

        return view('admin.personas.edit',compact('persona','tipos'));
    }

    public function update(StorePersonaRequest $request, Persona $persona)
    {
        $persona->update($request->all());

		return redirect()->route('admin.personas.edit', $persona)->with('info',"La persona se actualizó con éxito");
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();

		return redirect()->route('admin.personas.index', $persona)->with('info',"La persona se eliminó con éxito");
    }
}
