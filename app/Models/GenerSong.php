<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerSong extends Model
{
    use HasFactory;
    protected $table='geners_songs';

    public function cancion(){
        return $this->hasMany(Cancion::class, 'generSong_id', 'id');
    }
}
