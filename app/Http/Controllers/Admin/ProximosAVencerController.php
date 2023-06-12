<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProximosAVencerController extends Controller
{
    public function index(){
        return view('admin.vencimientos.index');
    }
}
