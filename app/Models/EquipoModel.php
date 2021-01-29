<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoModel extends Model
{
    use HasFactory;
    protected $table = 'equips';
    //protected $fillable = ["nombre","puesto"];//,"lastcheck"];  //could store new....
    protected $guarded = [];
}
