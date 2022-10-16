<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinaRequest;
use App\Models\Vacina;

class VacinaController extends Controller
{
    public function index(){
        $arrVacinas = Vacina::all();

        return view('vacinas.index', ['arrVacinas'=>$arrVacinas]);
    }

    public function create(){
        return view('vacinas.create');
    }

    public function store(VacinaRequest $request){
        Vacina::create($request->all());

        return redirect('vacinas');
    }

    public function destroy($id){
        Dieta::where('IDVACINA', $id)->delete();

        return redirect()->route('vacinas');
    }

    public function edit($id){
        $vacina = Vacina::where('IDVACINA', $id)->first();
        return view('vacinas.edit', compact('vacina'));
    }

    public function update(VacinaRequest $request, $id){
        $vacina = Vacina::where('IDVACINA', $id)->first();
        $vacina->update($request->all());

        return redirect()->route('vacinas');
    }
}
