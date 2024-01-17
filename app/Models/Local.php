<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{

    protected $fillable = ['nombre'];


    use HasFactory;


    protected function clases(){
        return $this->belongsTo(Clase::class);
    }
}
