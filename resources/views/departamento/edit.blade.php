<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edición de  Departamentos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-2">                    
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="{{route('departamento.update',$departamentos->idDepartamento)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" value="{{$departamentos->nombre}}" class="form-control"   required >
                                </div>
                                <div class="form group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" name="descripcion" value="{{$departamentos->descripcion}}"  class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" name="estado" value="{{$departamentos->estado}}" required class="form-control">
                                </div>
                                <div class="form-group my-2">
                                    <input type="submit" value="Guardar" class="btn btn-primary mr-2">
                                    <input type="reset" value="Cancelar" class="btn btn-light mr-2">
                                    <button type="button" onclick="javascript:history.back()" class="btn btn-dark ">Listado</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

