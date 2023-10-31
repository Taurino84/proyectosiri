<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$cargo->idCargo}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('cargo.destroy',$cargo->idCargo)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminación de Cargos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Realmente desea eliminar el Cargo: <strong>{{$cargo->nombre}}</strong>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                </div>
            </div>
        </form>
    </div>
</div>