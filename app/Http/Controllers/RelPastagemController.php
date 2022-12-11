<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelPastagemExport;

class RelPastagemController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('IDLOTE');
        if ($filtragem == null) {
            $arrPastagem = \DB::table('gerenciamento')
                ->join('pastagem', 'pastagem.IDPASTAGEM', '=', 'gerenciamento.IDPASTAGEM')
                ->join('lote', 'gerenciamento.IDLOTE', '=', 'lote.IDLOTE')
                ->select('pastagem.NMPASTAGEM', 'lote.NMLOTE', 'lote.IDLOTE', 'pastagem.DALIBERACAO', \DB::raw('(CASE pastagem.TPCULTURA
                                                                                                                  WHEN "S" 
                                                                                                                     THEN "Sorgo"
                                                                                                                  WHEN "C"
                                                                                                                     THEN "Capim"
                                                                                                                  WHEN "G"
                                                                                                                     THEN "Gramado"
                                                                                                                  END) AS DSTPCULTURA'))
                ->where('gerenciamento.FLATIVO', '!=', 'N')
                ->paginate(30);
        }
        else
            $arrPastagem = \DB::table('gerenciamento')
                    ->join('pastagem', 'pastagem.IDPASTAGEM', '=', 'gerenciamento.IDPASTAGEM')
                    ->join('lote', 'gerenciamento.IDLOTE', '=', 'lote.IDLOTE')
                    ->select('pastagem.NMPASTAGEM', 'lote.NMLOTE', 'lote.IDLOTE', 'pastagem.DALIBERACAO', \DB::raw('(CASE pastagem.TPCULTURA
                                                                                                                     WHEN "S" 
                                                                                                                        THEN "Sorgo"
                                                                                                                     WHEN "C"
                                                                                                                        THEN "Capim"
                                                                                                                     WHEN "G"
                                                                                                                        THEN "Gramado"
                                                                                                                     END) AS DSTPCULTURA'))
                     ->where('gerenciamento.IDLOTE', '=', $filtragem)
                     ->where('gerenciamento.FLATIVO', '!=', 'N')
                    ->paginate(30)
                    ->setpath('relpastagens?IDLOTE='.$filtragem);
                            

        return view('relpastagens.index', ['arrPastagem'=>$arrPastagem]);
    }

    public function exportacao() {
        return Excel::download(new RelPastagemExport, 'pastagens.xlsx');
    }

}
