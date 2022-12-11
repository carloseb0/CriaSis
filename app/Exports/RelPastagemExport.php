<?php

namespace App\Exports;

use App\Models\Pastagem;
use Maatwebsite\Excel\Concerns\FromCollection;

class RelPastagemExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
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
        return $arrPastagem;
    }
}
