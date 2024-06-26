<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    use HasFactory;
    protected $table = "vacinas";
    protected $primaryKey = "IDVACINA";
    protected $fillable = ['NMVACINA', 'DSFINALIDADE', 'NMFABRICANTE', 'QTDOSE', 'DAVALIDADE'];
}
