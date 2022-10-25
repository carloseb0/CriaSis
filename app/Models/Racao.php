<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racao extends Model
{
    use HasFactory;
    protected $table = "racao";
    protected $primaryKey = "IDRACAO";
    protected $fillable = ['NMRACAO', 'NMFABRICANTE', 'QTKG', 'DAVALIDADE', 'DSRACAO', 'FLATIVO'];

    public function dieta(){
        return $this->hasMany("App\Models\Dieta", 'IDRACAO');
    }
}
