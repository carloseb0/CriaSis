<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gerenciamento;
use App\Models\GerenciamentoVacina;
use App\Models\Pastagem;

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

        // Edita DALIBERACAO da pastagem
        Pastagem::where('IDPASTAGEM', $request->get('IDPASTAGEM'))->update(['DALIBERACAO' => date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 days'))]);

        //Cria gerenciamento_vacinas
        $arrVacinas = $request->vacinas;
        $arrDatas = $request->dataaplica;
        if(!empty($arrVacinas)){
            foreach($arrVacinas as $idVacina => $value) {
                GerenciamentoVacina::create([
                                'IDGERENCIAMENTO' => $gerenciamento->IDGERENCIAMENTO,
                                'IDVACINA' => $arrVacinas[$idVacina],
                                'DTAPLICACAO' => $arrDatas[$idVacina]
                            ]);
            }
        }

        return redirect()->route('gerenciamentos');
    }

    public function edit($id){
        $gerenciamento = Gerenciamento::where('IDGERENCIAMENTO', $id)->first();


        // $gerenciamento = \DB::table('gerenciamento')
        //                 ->join('gerenciamento_vacinas', 'gerenciamento.IDGERENCIAMENTO', '=', 'gerenciamento_vacinas.IDGERENCIAMENTO')
        //                 ->select('gerenciamento.*')
        //                 ->where('gerenciamento.IDGERENCIAMENTO', '=', $id)
        //                 ->orderBy('gerenciamento.IDGERENCIAMENTO', 'asc')
        //                 ->get()
        //                 ->first();

        //                 $gerenciamento = \DB::table('gerenciamento')
        //                                     ->join('gerenciamento_vacinas', 'gerenciamento.IDGERENCIAMENTO', '=', 'gerenciamento_vacinas.IDGERENCIAMENTO')
        //                                     ->select('gerenciamento.*')
        //                                     ->where('gerenciamento.IDGERENCIAMENTO', '=', $id)
        //                                     ->orderBy('gerenciamento.IDGERENCIAMENTO', 'asc')
        //                                     ->get()
        //                                     ->first();


                        // dd($gerenciamento);

        return view('gerenciamentos.edit', compact('gerenciamento'));
    }

    public function update(Request $request, $id){
        $gerenciamento = Gerenciamento::find($id);
        $gerenciamento->update($request->all());

        //Cria gerenciamento_vacinas
        $arrVacinas = $request->vacinas;
        $arrDatas = $request->dataaplica;
        if(!empty($arrVacinas)){
            foreach($arrVacinas as $idVacina => $value) {
                GerenciamentoVacina::create([
                                'IDGERENCIAMENTO' => $gerenciamento->IDGERENCIAMENTO,
                                'IDVACINA' => $arrVacinas[$idVacina],
                                'DTAPLICACAO' => $arrDatas[$idVacina]
                            ]);
            }
        }

        return redirect()->route('gerenciamentos');



        return redirect()->route('lotes');
    }

    


}
