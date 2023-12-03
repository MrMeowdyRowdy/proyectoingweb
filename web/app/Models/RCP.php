<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RCP extends Model
{
    use HasFactory;

    protected $fillable = [
        'llamadaID',
        'tipo',
        'mensaje'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function llamada(){
        return $this->hasOne(Llamada::class);
    }


}
