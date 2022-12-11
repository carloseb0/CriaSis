<?php

namespace App\Exports;

use App\Models\Gestacao;
use Maatwebsite\Excel\Concerns\FromCollection;

class RelGestacaoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
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
        return $arrRelGestacoes;
    }
}
