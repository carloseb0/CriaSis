<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerenciamento extends Model
{
    use HasFactory;
    protected $table = "gerenciamento";
    protected $primaryKey = "IDGERENCIAMENTO";
    protected $fillable = ['IDLOTE', 'IDDIETA', 'IDPASTAGEM', 'DSOBSERVACOES', 'FLATIVO'];

    public function lote(){
        return $this->belongsTo("App\Models\Lote", 'IDLOTE');
    }

    public function dieta(){
        return $this->belongsTo("App\Models\Dieta", 'IDDIETA');
    }

    public function pastagem(){
        return $this->belongsTo("App\Models\Pastagem", 'IDPASTAGEM');
    }

    public function vacinas(){
        return $this->hasMany("App\Models\GerenciamentoVacina", 'IDGERENCIAMENTO');
    }
    

}

