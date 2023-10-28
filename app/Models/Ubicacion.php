<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';
    protected $primaryKey = 'idUbicacion';
    protected $fillable=[
        'nombre','descripcion'
    ];
    protected $guarded=[];
    public $timestamps = false;
}
