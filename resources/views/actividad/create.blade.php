@extends('layouts.app')

@section('content')

    <div class="container">   
        <h2 class="text-center">Insertar actividad</h2>
        @if($errors->any())
            <div class="alert alert-warning" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                <div>
                    {{ session('status') }}
                </div>
            </div>
        @endif 
        </br>
         <div class="col-xl-12">
                <form action="{{route('actividad.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="aforo">Aforo</label>
                        <input type="number" class="form-control" name="aforo" required>
                    </div>

                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Guardar">
                    <input type="reset" class="btn btn-danger" value="Borrar">
                    <input type="button" class="btn btn-primary" value="Volver al listado" onclick="javascript:history.back()">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection