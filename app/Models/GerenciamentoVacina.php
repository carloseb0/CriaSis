<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GerenciamentoVacina extends Model
{
    use HasFactory;
    protected $table = "gerenciamento_vacinas";
    protected $fillable = ['IDGERENCIAMENTO', 'IDVACINA', 'DTAPLICACAO'];

    public function vacina(){
        return $this->belongsTo("App\Models\Vacina", 'IDVACINA');
    }
}
