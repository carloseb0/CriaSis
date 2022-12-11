<?php

namespace App\Exports;

use App\Models\Vacina;
use Maatwebsite\Excel\Concerns\FromCollection;

class RelVacinasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $arrVacinas = \DB::table('gerenciamento')
                    ->join('gerenciamento_vacinas', 'gerenciamento.IDGERENCIAMENTO', '=', 'gerenciamento_vacinas.IDGERENCIAMENTO')
                    ->join('vacinas', 'vacinas.IDVACINA', '=', 'gerenciamento_vacinas.IDVACINA')
                    ->join('lote', 'gerenciamento.IDLOTE', '=', 'lote.IDLOTE')
                    ->select('gerenciamento_vacinas.DTAPLICACAO', 'vacinas.NMVACINA', 'lote.NMLOTE', 'vacinas.QTDOSE')
                    ->where('gerenciamento.FLATIVO', '!=', 'N')
                    ->paginate(20);

        return $arrVacinas;
    }
}
