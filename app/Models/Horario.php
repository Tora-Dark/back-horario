<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = ['semana'];
    use HasFactory;

    public function clases(){
        return $this->belongsToMany(Clase::class,'horarios_clases', 'clase_id','horario_id');
    }
}
