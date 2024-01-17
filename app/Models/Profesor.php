<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{


    protected $fillable = ['name','id_asignatura'];

    use HasFactory;

    protected function asignatura(){
        return $this->hasOne(Asignatura::class);
    }
}
