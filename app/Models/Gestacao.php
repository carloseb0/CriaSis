<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestacao extends Model
{
    use HasFactory;
    protected $table = "gestacao";
    protected $primaryKey = "IDGESTACAO";
    protected $fillable = ['IDANIMAL', 'DAINSEMINACAO', 'DANASCIMENTOESTIMADO', 'TPCUIDADO'];

    public function animais(){
        return $this->belongsTo("App\Models\Animal", 'IDANIMAL');
    }
}
