<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intructor extends Model
{
    use HasFactory;

    protected $table='instructores';
    protected $fillable=[
        'nombre',
        'turno'
    ];
}
