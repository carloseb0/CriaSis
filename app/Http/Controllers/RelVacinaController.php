<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacina;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelVacinasExport;

class RelVacinaController extends Controller
{
	public function index(Request $filtro) {
		$filtragem = $filtro->get('IDLOTE');
        if ($filtragem == null) {
    		$arrVacinas = \DB::table('gerenciamento')
	            ->join('gerenciamento_vacinas', 'gerenciamento.IDGERENCIAMENTO', '=', 'gerenciamento_vacinas.IDGERENCIAMENTO')
              ->join('vacinas', 'vacinas.IDVACINA', '=', 'gerenciamento_vacinas.IDVACINA')
              ->join('lote', 'gerenciamento.IDLOTE', '=', 'lote.IDLOTE')
	            ->select('gerenciamento_vacinas.DTAPLICACAO', 'vacinas.NMVACINA', 'lote.NMLOTE', 'vacinas.DSFINALIDADE', 'vacinas.QTDOSE')
              ->where('gerenciamento.FLATIVO', '!=', 'N')
	            ->paginate(20);
        }
        else
            $arrVacinas = \DB::table('gerenciamento')
                    ->join('gerenciamento_vacinas', 'gerenciamento.IDGERENCIAMENTO', '=', 'gerenciamento_vacinas.IDGERENCIAMENTO')
                    ->join('vacinas', 'vacinas.IDVACINA', '=', 'gerenciamento_vacinas.IDVACINA')
                    ->join('lote', 'gerenciamento.IDLOTE', '=', 'lote.IDLOTE')
                    ->select('gerenciamento_vacinas.DTAPLICACAO', 'vacinas.NMVACINA', 'lote.NMLOTE', 'vacinas.DSFINALIDADE', 'vacinas.QTDOSE')
                    ->where('gerenciamento.IDLOTE', '=', $filtragem)
                    ->where('gerenciamento.FLATIVO', '!=', 'N')
                    ->paginate(20)
                    ->setpath('relvacinas?IDLOTE='.$filtragem);
        					

		return view('relvacinas.index', ['arrVacinas'=>$arrVacinas]);
	}

  public function exportacao() {
    return Excel::download(new RelVacinasExport, 'vacinas.xlsx');
	}

}


