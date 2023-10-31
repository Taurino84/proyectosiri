<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edición de Cargos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="{{route('cargo.update',$cargos->idCargo)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" value="{{$cargos->nombre}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" name="descripcion" value="{{$cargos->descripcion}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Guardar" class="btn btn-primary">
                                    <input type="reset" value="Cancelar" class="btn btn-light  ">
                                    <button type="submit" onclick="javascript:history.back()" class="btn btn-dark ">Listado</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
