
<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$ubicacion->idUbicacion}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('ubicacion.destroy',$ubicacion->idUbicacion)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimincación de Ubicacion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseas eliminar la Ubicacion: <span class="font-weight-bold">{{$ubicacion->nombre}}</span>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                </div>
            </div>
        </form>
    </div>
</div>