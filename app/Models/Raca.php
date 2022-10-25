<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    use HasFactory;
    protected $table = "raca";
    protected $primaryKey = "IDRACA";
    protected $fillable = ['NMRACA', 'FLATIVO'];

    public function animais(){
        return $this->hasMany("App\Models\Animal", 'IDRACA');
    }
}
