<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios') }}
        </h2>
    </x-slot>    
    <div class="container">        
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('usuario.index')}}" method="GET">
                    <div class="row my-1 mt-2">
                        <div class="col-sm-4">
                            <input type="text" name="texto" class="form-control" value="{{$texto}}">
                        </div>
                        <div class="col-auto">
                            <input type="submit" value="Buscar" class="btn btn-primary">
                        </div>
                        <div class="col-auto">
                            <a href="{{route('usuario.create')}}" class="btn btn-success">Nuevo</a>
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
                                <th>Alias</th>
                                <th>Email</th>
                                <th>Contraseña</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($usuarios)<=0)
                                <tr>
                                    <td colspan="8">La busqueda no obtuvo resultados...</td>
                                </tr>
                            @else                               
                            
                            @foreach ($usuarios as $usuario)
                                                            
                            <tr>
                                <td>Editar | Eliminar</td>
                                <td>{{$usuario->idUsuario}}</td>
                                <td>{{$usuario->alias}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->password}}</td>
                            </tr>
                            @include('usuario.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$usuarios->links()}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

