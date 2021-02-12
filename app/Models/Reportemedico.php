<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportemedico extends Model
{
    use HasFactory;
    protected $table = 'reportemedico';
    //protected $fillable = ["nombre","idempleado","fecha","contenido"];
    protected $guarded = [];
}
