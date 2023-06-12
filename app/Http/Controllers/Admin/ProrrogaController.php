<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use Illuminate\Http\Request;

class ProrrogaController extends Controller
{
    public function index()
    {
        return view('admin.prorrogas.index');
    }

    public function destroy(Contrato $prorroga)
    {
        $prorroga->delete();

		return redirect()->route('admin.prorrogas.index', $prorroga)->with('info',"El documento se eliminó con éxito");
    }
}
