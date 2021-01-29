<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incidentes extends Model
{
    use HasFactory;
    protected $table = 'incidentes';
    //protected $fillable = ["nombre","idempleado","fecha","contenido"];
    protected $guarded = [];
}
