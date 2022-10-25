<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    use HasFactory;
    protected $table = "dieta";
    protected $primaryKey = "IDDIETA";
    protected $fillable = ['NMDIETA', 'DSDIETA', 'TPUSODIETA', 'IDRACAO', 'FLATIVO'];

    public function racao(){
        return $this->belongsTo("App\Models\Racao", "IDRACAO");
    }
}
