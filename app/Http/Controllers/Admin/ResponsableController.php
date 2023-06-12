<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResponsableRequest;
use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function index()
    {
        return view('admin.responsables.index');
    }

    public function create()
    {

        return view('admin.responsables.create');
    }

    public function store(ResponsableRequest $request)
    {
        $responsable = Responsable::create($request->all());

		return redirect()->route('admin.responsables.edit',$responsable)->with('info',"El responsable se creó con éxito");
    }

    public function show(Responsable $responsable)
    {
        return view('admin.responsables.show');
    }

    public function edit(Responsable $responsable)
    {
        return view('admin.responsables.edit',compact('responsable'));
    }

    public function update(ResponsableRequest $request, Responsable $responsable)
    {
        $responsable->update($request->all());

		return redirect()->route('admin.responsables.edit', $responsable)->with('info',"El responsable se actualizó con éxito");
    }

    public function destroy(Responsable $responsable)
    {
        $responsable->delete();

		return redirect()->route('admin.responsables.index', $responsable)->with('info',"El responsable se eliminó con éxito");
    }
}
