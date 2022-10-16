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

    public function destroy($id){
        Raca::where('IDRACA', $id)->delete();

        return redirect()->route('racas');
    }

    public function edit($id){
        $raca = Raca::where('IDRACA', $id)->first();
        return view('racas.edit', compact('raca'));
    }

    public function update(RacaRequest $request, $id){
        $raca = Raca::where('IDRACA', $id)->first();
        $raca->update($request->all());

        return redirect()->route('racas');
    }
}
