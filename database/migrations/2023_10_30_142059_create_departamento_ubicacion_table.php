<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departamento_ubicacion', function (Blueprint $table) {
            $table->id('idDepUbi');
            $table->unsignedBigInteger('idDepartamento');
            $table->unsignedBigInteger('idUbicacion');
            $table->foreign('idDepartamento')
                ->references('idDepartamento')
                ->on('departamentos')
                ->onDelete('no action')
                ->onUpdate('cascade');
            
            $table->foreign('idUbicacion')
                ->references('idUbicacion')
                ->on('ubicaciones')
                ->onDelete('no action')
                ->onUpdate('cascade');     
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamento_ubicacion');
    }
};
