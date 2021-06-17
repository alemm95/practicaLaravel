<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('user.destroy',$user->id)}}" method="post">
        @csrf
        @method('DELETE')
        
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ¿Desea eliminar el registro de {{$user->name}}? No podrá recuperarse.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
        </div>
        </div>
    </form>
  </div>
</div>