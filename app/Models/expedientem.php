<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expedientem extends Model
{
    use HasFactory;
    protected $table = 'expedientems';
    //protected $fillable = ["nombre","idempleado","fecha","contenido"];
    protected $guarded = [];
}
