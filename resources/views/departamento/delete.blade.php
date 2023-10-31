<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$departamento->idDepartamento}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('departamento.destroy',$departamento->idDepartamento)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminación de Departamentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Realmente desea eliminar el Departamento: <strong>{{$departamento->nombre}}</strong>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" value="Eliminar" class="btn btn-danger">
                </div>
            </div>
        </form>
    </div>
  </div>