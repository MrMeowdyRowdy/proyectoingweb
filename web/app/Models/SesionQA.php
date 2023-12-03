<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionQA extends Model
{
    use HasFactory;

    protected $fillable = [
        'QAID',
        'interpreterID',
        'date',
        'horaInicio',
        'horaFin',
        'porcentaje',
        'feedback'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function qa(){
        return $this->hasOne(User::class);
    }


}
