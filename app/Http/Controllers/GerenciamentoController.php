<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gerenciamento;
use App\Models\GerenciamentoVacina;

class GerenciamentoController extends Controller
{
    public function index(){
        $arrGerenciamento = Gerenciamento::orderBy('IDGERENCIAMENTO')->paginate(10);
        return view('gerenciamentos.index', ['arrGerenciamento'=>$arrGerenciamento]);
    }

    public function create(){
        return view('gerenciamentos.create');
    }

    public function store(Request $request){
        $gerenciamento = Gerenciamento::create([
                            'IDLOTE' => $request->get('IDLOTE'),
                            'IDDIETA' => $request->get('IDDIETA'),
                            'IDPASTAGEM' => $request->get('IDPASTAGEM'),
                            'DSOBSERVACOES' => $request->get('DSOBSERVACOES')
                        ]);

        $arrVacinas = $request->vacinas;
        if(!empty($arrVacinas)){
            foreach($arrVacinas as $idVacina => $value) {
                GerenciamentoVacina::create([
                                'IDGERENCIAMENTO' => $gerenciamento->IDGERENCIAMENTO,
                                'IDVACINA' => $arrVacinas[$idVacina],
                                'DTAPLICACAO' => $arrVacinas[$idVacina]
                            ]);
            }
        }

        return redirect()->route('gerenciamentos');
    }

    public function edit($id){
        $gerenciamento = Gerenciamento::where('IDGERENCIAMENTO', $id)->first();
        return view('gerenciamentos.edit', compact('gerenciamento'));
    }

    


}
