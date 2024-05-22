<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceDeCarga extends Model
{
    use HasFactory;

    protected $table = 'balance_de_carga';

    protected $fillable = [
        'asignatura_id',
        'horario_id',
        'cantidad'
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}
