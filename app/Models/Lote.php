<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lote extends Model
{
    use HasFactory;
    protected $table = "lote";
    protected $primaryKey = "IDLOTE";
    protected $fillable = ['NMLOTE', 'DSDESCRICAO', 'FLATIVO'];

    public function animais(){
        return $this->hasMany("App\Models\LoteAnimal", 'IDLOTE');
    }
}
