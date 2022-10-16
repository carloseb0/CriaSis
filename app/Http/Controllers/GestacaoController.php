<?php

namespace App\Http\Controllers;

use App\Http\Requests\GestacaoRequest;
use App\Models\Gestacao;


class GestacaoController extends Controller
{
    public function index(){
        // Como fazer get com wherer : Raca::where('FLATIVO', '=', 'S')->get();
        $arrGestacoes = Gestacao::all();

        return view('gestacoes.index', ['arrGestacoes'=>$arrGestacoes]);
    }

    public function create(){
        return view('gestacoes.create');
    }

    public function store(GestacaoRequest $request){
        Gestacao::create($request->all());

        return redirect()->route('gestacoes');
    }

    public function destroy($id){
        Gestacao::where('IDGESTACAO', $id)->delete();

        return redirect()->route('gestacoes');
    }

    public function edit($id){
        $gestacao = Gestacao::where('IDGESTACAO', $id)->first();
        return view('gestacoes.edit', compact('gestacao'));
    }

    public function update(GestacaoRequest $request, $id){
        $gestacao = Gestacao::where('IDGESTACAO', $id)->first();
        $gestacao->update($request->all());

        return redirect()->route('gestacoes');
    }
}
