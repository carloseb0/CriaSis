<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = "perfil";
    protected $primaryKey = "IDPERFIL";
    protected $fillable = ['NMPERFIL', 'DSDESCRICAO', 'FLATIVO'];

    public function usuario(){
        return $this->hasMany("App\Models\User", 'IDPERFIL');
    }
}
