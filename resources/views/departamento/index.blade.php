<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Departamentos') }}
        </h2>
    </x-slot>    
    <div class="container">        
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('departamento.index')}}" method="GET">
                    <div class="row my-1 mt-2">
                        <div class="col-sm-4">
                            <input type="text" name="texto" class="form-control" value="{{$texto}}">
                        </div>
                        <div class="col-auto">
                            <input type="submit" value="Buscar" class="btn btn-primary">
                        </div>
                        <div class="col-auto">
                            <a href="{{route('departamento.create')}}" class="btn btn-success">Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($departamentos)<=0)
                                <tr>
                                    <td colspan="8">La busqueda no obtuvo resultados...</td>
                                </tr>
                            @else                               
                            
                            @foreach ($departamentos as $departamento)
                                                            
                            <tr>
                                <td><a href="{{route('departamento.edit',$departamento->idDepartamento)}}" class="btn btn-warning btn-sm">Editar</a> 
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$departamento->idDepartamento}}">
                                        Eliminar
                                    </button>
                                </td>
                                <td>{{$departamento->idDepartamento}}</td>
                                <td>{{$departamento->nombre}}</td>
                                <td>{{$departamento->descripcion}}</td>
                                <td>{{$departamento->estado}}</td>
                            </tr>
                            @include('departamento.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$departamentos->links()}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

