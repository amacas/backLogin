<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;
    protected $table='canciones';
    public $timestamps = false;
        //Array para guardar los datos
        protected $filleable =[
            'time',
            'name_song',
            'sizeFile',

            'album_id',
            'usuario_id',
            'generSong_id',
            'year_id',
        ];
}
