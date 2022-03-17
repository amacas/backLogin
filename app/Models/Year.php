<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $table='years';


    //Uno a muchos
    public function cancion(){
        return $this->hasMany(Cancion::class);
    }
}
