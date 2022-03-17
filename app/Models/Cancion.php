<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;
    protected $table='canciones';

    //Array para guardar los datos
    protected $filleable =[
        'usuario_id',
        'generSong_id',
        'album_id',
        'year_id',
        'time',
        'name_song',
        'sizeFile',
        'estado'
    ];

    //uno a muchos (Inverso) -> muchos a uno
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    //uno a muchos (Inverso) -> muchos a uno
    public function generSong(){
        return $this->belongsTo(GenerSong::class, 'generSong_id', 'id');
    }

    //uno a muchos (Inverso) -> muchos a uno
    public function year(){
        return $this->belongsTo(Year::class);
    }

    //uno a muchos (Inverso) -> muchos a uno
    public function album(){
        return $this->belongsTo(Album::class);
    }

}
