<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model{
    
    use HasFactory;
    protected $table = "animal";
    protected $primaryKey = "IDANIMAL";
    protected $fillable = ['CODANIMAL', 'IDRACA', 'TPSEXO', 'DANASCIMENTO'];

    public function raca(){
        return $this->belongsTo("App\Models\Raca", "IDRACA");
    }

    public function gestacao(){
        return $this->hasMany("App\Models\Gestacao", "IDANIMAL");
    }

    public function lotes(){
        return $this->belongsTo("App\Models\LoteAnimal", "IDANIMAL");
    }
}
