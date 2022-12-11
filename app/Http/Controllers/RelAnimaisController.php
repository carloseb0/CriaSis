<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelAnimaisExport;

class RelAnimaisController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('IDLOTE');
        if ($filtragem == null) {
            $arrAnimais = \DB::table('animal')
                ->join('raca', 'animal.IDRACA', '=', 'raca.IDRACA')
                ->leftJoin('lote_animal', 'animal.IDANIMAL', '=', 'lote_animal.IDANIMAL')
                ->leftJoin('lote', 'lote_animal.IDLOTE', '=', 'lote.IDLOTE')
                ->select('animal.CODANIMAL', 'lote.NMLOTE', 'raca.NMRACA', \DB::raw('DATEDIFF(CURDATE(), animal.DANASCIMENTO) QTDIASVIVIDOS'))
                ->paginate(30);
        }
        else
            $arrAnimais = \DB::table('animal')
                    ->join('raca', 'animal.IDRACA', '=', 'raca.IDRACA')
                    ->leftJoin('lote_animal', 'animal.IDANIMAL', '=', 'lote_animal.IDANIMAL')
                    ->leftJoin('lote', 'lote_animal.IDLOTE', '=', 'lote.IDLOTE')
                    ->select('animal.CODANIMAL', 'lote.NMLOTE', 'raca.NMRACA', \DB::raw('DATEDIFF(CURDATE(), animal.DANASCIMENTO) QTDIASVIVIDOS'))
                    ->where('lote.IDLOTE', '=', $filtragem)
                    ->paginate(30)
                    ->setpath('relanimais?IDLOTE='.$filtragem);
                            

        return view('relanimais.index', ['arrAnimais'=>$arrAnimais]);
    }

    public function exportacao() {
        return Excel::download(new RelAnimaisExport, 'animais.xlsx');
    }
}
