@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar usuario</h2>
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
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('updateAuth') }}" method="post">
                @csrf
                @method('POST')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Contraseña</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="name">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Guardar">
                    <input type="reset" class="btn btn-danger" value="Restablecer datos">
                    <input type="button" class="btn btn-primary" value="Volver atrás" onclick="javascript:history.back()">
                    </div>
                </form>
            </div>
            
        </div>
    </div>
@endsection