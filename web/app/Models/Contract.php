<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeId',
        'creation',
        'price'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class,'employeeId');
    }
}
