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
        return Vacina::all();
    }
}
