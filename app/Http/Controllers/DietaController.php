<?php

namespace App\Http\Controllers;

use App\Http\Requests\DietaRequest;
use App\Models\Dieta;

class DietaController extends Controller
{
    public function index(){
        // Como fazer get com wherer : Raca::where('FLATIVO', '=', 'S')->get();
        $arrDietas = Dieta::all();

        return view('dietas.index', ['arrDietas'=>$arrDietas]);
    }

    public function create(){
        return view('dietas.create');
    }

    public function store(DietaRequest $request){
        Dieta::create($request->all());

        return redirect('dietas');
    }
}
