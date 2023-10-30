<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Ubicacion extends Model
{
    protected $table = 'ubicaciones';
    protected $primaryKey = 'idUbicacion';
    protected $fillable=[
        'nombre','direccion'
    ];
    protected $guarded=[];
    public $timestamps = false;

    /**
     * The roles that belong to the Ubicacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function departamentos(): BelongsToMany
    {
        return $this->belongsToMany(Departamento::class, 'departamento_ubicacion', 'idDepartamento', 'idUbicacion');
    }
}
