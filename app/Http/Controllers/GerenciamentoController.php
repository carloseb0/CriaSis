<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gerenciamento;
use App\Models\GerenciamentoVacina;
use App\Models\Pastagem;
use App\Models\Lote;

class GerenciamentoController extends Controller
{
    public function index(){
        $arrGerenciamento = Gerenciamento::where('FLATIVO', 'S')->orderBy('IDGERENCIAMENTO')->paginate(10);
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
                            'DSOBSERVACOES' => $request->get('DSOBSERVACOES'),
                            'FLATIVO' => "S"
                        ]);

        // Edita DALIBERACAO da pastagem
        Pastagem::where('IDPASTAGEM', $request->get('IDPASTAGEM'))->update(['DALIBERACAO' => date('Y-m-d', strtotime(date('Y-m-d'). ' + 15 days'))]);

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

        return view('gerenciamentos.edit', compact('gerenciamento'));
    }

    public function update(Request $request, $id){
        $gerenciamento = Gerenciamento::find($id);
        $gerenciamento->update($request->all());

        Pastagem::where('IDPASTAGEM', $request->get('IDPASTAGEM'))->update(['DALIBERACAO' => date('Y-m-d', strtotime(date('Y-m-d'). ' + 15 days'))]);

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

    public function finalizar($id){
        Gerenciamento::where('IDGERENCIAMENTO', $id)->update(['FLATIVO' => 'N']);
        $gerenciamento = Gerenciamento::where('IDGERENCIAMENTO', $id)->first();

        Lote::where('IDLOTE', $gerenciamento->IDLOTE)->update(['FLATIVO' => 'N']);

        return redirect()->route('gerenciamentos');
    }

    public function destroy($id){
        try {
		    Gerenciamento::find($id)->delete();
			$ret = array('status'=>200, 'msg'=>"null");
		} catch (\Illuminate\Database\QueryException $e) {
			$ret = array('status'=>500, 'msg'=>$e->getMessage());
		} 
		catch (\PDOException $e) {
			$ret = array('status'=>500, 'msg'=>$e->getMessage());
		}
		return $ret;
    }
}
