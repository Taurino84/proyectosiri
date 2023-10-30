<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Departamento extends Model
{
    protected $table='departamentos';
    protected $primaryKey='idDepartamento';
    protected $fillable=[
        'nombre','descripcion','estado'
    ];
    protected $guarded=[];
    public $timestamps=false;

    /**
     * The roles that belong to the Departamento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ubicaciones(): BelongsToMany
    {
        return $this->belongsToMany(Ubicacion::class, 'departamento_ubicacion', 'idDepartamento', 'idUbicacion');
    }

}
