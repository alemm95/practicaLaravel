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
        @endif  </br>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('user.update',$user->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
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
                        <input type="text" class="form-control" name="address" value="{{$user->address}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                    </div>
                    @if($user->role_id == 1)
                        <div class="form-check">
                            <input  type="radio" class="form-check-input" name="role_id" value="1" id="1" checked>
                            <label for="1">Admin</label>
                        </div>
                        <div class="form-check">
                            <input  type="radio" class="form-check-input" name="role_id" value="2" id="2">
                            <label for="2">Cliente</label>
                        </div>
                    @else
                        <div class="form-check">
                            <input  type="radio" class="form-check-input" name="role_id" value="1" id="1">
                            <label for="1">Admin</label>
                        </div>
                        <div class="form-check">
                            <input  type="radio" class="form-check-input" name="role_id" value="2" id="2" checked>
                            <label for="2">Cliente</label>
                        </div>
                    @endif

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