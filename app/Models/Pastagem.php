<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pastagem extends Model
{
    use HasFactory;
    protected $table = "pastagem";
    protected $primaryKey = "IDPASTAGEM";
    protected $fillable = ['NMPASTAGEM', 'DSPASTAGEM', 'TPCULTURA', 'FLATIVO'];
}
