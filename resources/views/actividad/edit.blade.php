@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Editar actividad</h2>
        @if($errors->any())
            <div class="alert alert-warning" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif </br>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('actividad.update',$actividad->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{$actividad->name}}">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="{{$actividad->descripcion}}">
                    </div>
                    <div class="form-group">
                        <label for="aforo">Aforo</label>
                        <input type="number" class="form-control" name="aforo" value="{{$actividad->aforo}}">
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Guardar">
                    <input type="reset" class="btn btn-danger" value="Restablecer datos">
                    <input type="button" class="btn btn-primary" value="Volver al listado" onclick="javascript:history.back()">
                    </div>
                </form>
            </div>
            
        </div>
    </div>
@endsection