<?php

namespace App\Exports;

use App\Models\Animais;
use Maatwebsite\Excel\Concerns\FromCollection;

class RelAnimaisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $arrAnimais = \DB::table('animal')
                        ->join('raca', 'animal.IDRACA', '=', 'raca.IDRACA')
                        ->leftJoin('lote_animal', 'animal.IDANIMAL', '=', 'lote_animal.IDANIMAL')
                        ->leftJoin('lote', 'lote_animal.IDLOTE', '=', 'lote.IDLOTE')
                        ->select('animal.CODANIMAL', 'lote.NMLOTE', 'raca.NMRACA', \DB::raw('DATEDIFF(CURDATE(), animal.DANASCIMENTO) QTDIASVIVIDOS'))
                        ->paginate(30);
                        
        return $arrAnimais;
    }
}
