<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brigada extends Model
{
    use HasFactory;

    public function clases()
    {
        return $this->belongsToMany(Clase::class, 'clases_brigadas', 'clases_id','brigada_id');
    }
}
