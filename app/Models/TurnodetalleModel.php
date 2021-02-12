<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnodetalleModel extends Model
{
    use HasFactory;
    protected $table = 'turnodetalles';         
    //protected $fillable = ["idempleado","fecha"];
    protected $guarded = [];
}
