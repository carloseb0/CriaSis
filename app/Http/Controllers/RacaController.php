<?php

namespace App\Http\Controllers;

use App\Http\Requests\RacaRequest;
use App\Models\Raca;

class RacaController extends Controller
{
    public function index(){
        // Como fazer get com wherer : Raca::where('FLATIVO', '=', 'S')->get();
        $arrRacas = Raca::all();

        return view('racas.index', ['arrRacas'=>$arrRacas]);
    }

    public function create(){
        return view('racas.create');
    }

    public function store(RacaRequest $request){
        Raca::create($request->all());

        return redirect('racas');
    }
}
