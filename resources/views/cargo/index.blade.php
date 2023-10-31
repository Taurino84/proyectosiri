<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Cargos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="{{route('cargo.index')}}" method="GET">
                                <div class="row my-1">
                                    <div class="col-sm-4">
                                        <input type="text" name="texto" value="{{$texto}}" class="form-control" placeholder="Ingrese el Cargo">
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" value="Buscar" class="btn btn-primary">
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{route('cargo.create')}}" class="btn btn-success">Nuevo</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped ">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Opciones</th>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descrición</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($cargos)<=0)
                                            <tr>
                                                <td colspan="8">La busqueda no obtuvo resultados...</td>
                                            </tr>
                                        @else                                            
                                        
                                        @foreach ($cargos as $cargo)                                            
                                        
                                        <tr>
                                            <td><a href="{{route('cargo.edit',$cargo->idCargo)}}" class="btn btn-warning btn-sm">Editar</a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{$cargo->idCargo}}">
                                                    Eliminar
                                                </button>
                                                </td>
                                            <td>{{$cargo->idCargo}}</td>
                                            <td>{{$cargo->nombre}}</td>
                                            <td>{{$cargo->descripcion}}</td>
                                        </tr>
                                        @include('cargo.delete')
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout> 