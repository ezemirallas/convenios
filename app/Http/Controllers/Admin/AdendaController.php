<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use Illuminate\Http\Request;

class AdendaController extends Controller
{
    public function index()
    {
        return view('admin.adendas.index');
    }

    public function destroy(Contrato $adenda)
    {
        $adenda->delete();

		return redirect()->route('admin.adendas.index', $adenda)->with('info',"El documento se eliminó con éxito");
    }
}
