<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $table='clases';
    protected $fillable=[
        'turno',
        'h_inicio',
        'h_final',
        'instructor'
    ];
}
