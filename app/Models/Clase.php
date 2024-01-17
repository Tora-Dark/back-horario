<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'tipo',
        'turn',
        'fecha',
        'asignatura_id',
        'local_id',
    ];

    use HasFactory;
    public function asignatura(){
        return $this->hasOne(Asignatura::class,'id','asignatura_id');
    }

    public function local(){
        return $this->hasOne(Local::class,'id','local_id');
    }

    public function brigadas()
    {
        return $this->belongsToMany(Brigada::class, 'clases_brigadas', 'brigada_id','clases_id');
    }

    public function horario(){
        return $this->belongsTo(Horario::class,'horario_id');
    }

}
