<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Ubicaciones') }}
        </h2>
    </x-slot>    
    <div class="container">        
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('ubicacion.index')}}" method="GET">
                    <div class="row my-1 mt-2">
                        <div class="col-sm-4">
                            <input type="text" name="texto" class="form-control" value="{{$texto}}">
                        </div>
                        <div class="col-auto">
                            <input type="submit" value="Buscar" class="btn btn-primary">
                        </div>
                        <div class="col-auto">
                            <a href="{{route('ubicacion.create')}}" class="btn btn-success">Nuevo</a>
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
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($ubicaciones)<=0)
                                <tr>
                                    <td colspan="8">La busqueda no obtuvo resultados...</td>
                                </tr>
                            @else                               
                            
                            @foreach ($ubicaciones as $ubicacion)
                                                            
                            <tr>
                                <td><a href="{{route('ubicacion.edit',$ubicacion->idUbicacion)}}" class="btn btn-warning btn-sm">Editar</a> 
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$ubicacion->idUbicacion}}">
                                        Eliminar
                                    </button>
                                </td>
                                <td>{{$ubicacion->idUbicacion}}</td>
                                <td>{{$ubicacion->nombre}}</td>
                                <td>{{$ubicacion->descripcion}}</td>
                            </tr>
                            @include('ubicacion.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$ubicaciones->links()}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

