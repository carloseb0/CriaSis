<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelGestacaoExport;

class RelGestacaoController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('TPCUIDADO');
        if ($filtragem == null) {
            $arrRelGestacoes = \DB::table('gestacao')
                ->join('animal', 'animal.IDANIMAL', '=', 'gestacao.IDANIMAL')
                ->leftJoin('lote_animal', 'animal.IDANIMAL', '=', 'lote_animal.IDANIMAL')
                ->leftJoin('lote', 'lote_animal.IDLOTE', '=', 'lote.IDLOTE')
                ->select('animal.CODANIMAL', 'lote.NMLOTE', 'gestacao.DANASCIMENTOESTIMADO',            
                \DB::raw('(CASE TPCUIDADO 
                            WHEN "B" 
                                THEN "Baixo"
                            WHEN "M"
                                THEN "Médio"
                            WHEN "A"
                                THEN 
                                    "Alto"
                        END) AS DSTPCUIDADO'))
                ->paginate(30);
        }
        else
            $arrRelGestacoes = \DB::table('gestacao')
                    ->join('animal', 'animal.IDANIMAL', '=', 'gestacao.IDANIMAL')
                    ->leftJoin('lote_animal', 'animal.IDANIMAL', '=', 'lote_animal.IDANIMAL')
                    ->leftJoin('lote', 'lote_animal.IDLOTE', '=', 'lote.IDLOTE')
                    ->select('animal.CODANIMAL', 'lote.NMLOTE', 'gestacao.DANASCIMENTOESTIMADO',       
                    \DB::raw('(CASE TPCUIDADO 
                                WHEN "B" 
                                    THEN "Baixo"
                                WHEN "M"
                                    THEN "Médio"
                                WHEN "A"
                                    THEN 
                                        "Alto"
                            END) AS DSTPCUIDADO'))
                    ->where('gestacao.TPCUIDADO', '=', $filtragem)
                    ->paginate(30)
                    ->setpath('relgestacoes?TPCUIDADO='.$filtragem);
                            

        return view('relgestacoes.index', ['arrRelGestacoes'=>$arrRelGestacoes]);
    }

    public function exportacao() {
        return Excel::download(new RelGestacaoExport, 'gestacoes.xlsx');
    }
}
