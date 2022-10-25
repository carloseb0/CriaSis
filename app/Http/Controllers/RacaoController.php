<?php

namespace App\Http\Controllers;

use App\Models\Racao;
use App\Http\Requests\RacaoRequest;

class RacaoController extends Controller
{
    public function index(){
        // $arrRacoes = Racao::orderBy('NMRACAO')->paginate(10);
        $arrRacoes = Racao::select("racao.*",
                                    \DB::raw('(CASE 
                                        WHEN FLATIVO = "s" THEN "Sim"
                                        ELSE "Não"
                                        END) AS DSFLATIVO'))
                                ->paginate(10);

        return view('racoes.index', ['arrRacoes'=>$arrRacoes]);
    }

    public function create(){
        return view('racoes.create');
    }

    public function store(RacaoRequest $request){
        $nova_Racao = $request->all();
        Racao::create($nova_Racao);

        return redirect('racoes')->with('mensagem', 'Cadastrado com sucesso!');
    }

    public function destroy($id){
        Racao::where('IDRACAO', $id)->delete();

        return redirect()->route('racoes');
    }

    public function edit($id){
        $racao = Racao::where('IDRACAO', $id)->first();
        return view('racoes.edit', compact('racao'));
    }

    public function update(RacaoRequest $request, $id){
        $racao = Racao::where('IDRACAO', $id)->first();
        $racao->update($request->all());

        return redirect()->route('racoes');
    }
}
