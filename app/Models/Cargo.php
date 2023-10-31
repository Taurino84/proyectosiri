<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $primaryKey='idCargo';
    protected $fillable=[
        'nombre','descripcion'
    ];
    protected $guarded=[];

    public $timestamps = false;

    
}
