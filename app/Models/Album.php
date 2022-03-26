<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table='albums';

    //Array para guardar los datos
    protected $filleable=[
        'name_album',
        'estado'
        
    ];



    //Uno a muchos
    public function cancion(){
        return $this->hasMany(Cancion::class);
    }
}
