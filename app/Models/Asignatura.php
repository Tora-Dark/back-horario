<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','siglas','color'];

    protected function profesor(){
    return $this->belongsTo(Profesor::class);
}
public function clases(){
    return $this->belongsTo(Clase::class);
}

}




