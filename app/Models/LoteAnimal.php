<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteAnimal extends Model
{
    use HasFactory;
    protected $table = "lote_animal";
    protected $fillable = ['IDLOTE', 'IDANIMAL'];

    public function animal(){
        return $this->belongsTo("App\Models\Animal", 'IDANIMAL');
    }
}
