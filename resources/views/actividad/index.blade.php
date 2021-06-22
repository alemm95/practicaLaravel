@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="text-center">Actividades</h2>
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
        <div class="inline-block mr-2 mt-2">
            <div class="col-lx-12">
                <form action="{{route('actividad.index')}}" method="get">
                    <div class="form-row justify-content-center">
                        <div class="col-sm-2 my-1">
                            <input type="text" class="form-control" name="text" value="{{$text}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-1">
                            <form action="{{route('actividad.index')}}" method="get">
                                <select class="form-control form-select-lg mb-3 ml-2" name="order">
                                    <option selected value="1">Seleccione el campo</option>
                                    <option value="1">ID</option>
                                    <option value="2">Nombre</option>
                                    <option value="3">Aforo</option>
                                </select>
                            </div>
                            <div class="col-auto my-1">
                                <input type="submit" class="btn btn-primary mr-5 ml-2" value="Ordenar">
                            </div>
                            </form>
                            
                                
                            <div class="col-auto my-1">
                            @if(Auth::user()->role_id == 1)
                                <a href="{{route('actividad.create')}}" class="btn btn-success">Insertar</a>
                            @endif
                        </div>
                        
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Aforo</th>
                                @if(Auth::user()->role_id == 1)
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($actividades)<=0)
                                <tr>
                                    <td colspan="4">No hay resultados</td>
                                </tr>
                            @else
                            @foreach ($actividades as $actividad)
                            
                                <tr>
                                    <td>{{$actividad->id}}</td>
                                    <td>{{$actividad->name}}</td>
                                    <td>{{$actividad->aforo}}</td>
                                    @if(Auth::user()->role_id == 1)
                                        <td>
                                            <div class="form-row justify-content-center">
                                                <form action="{{route('actividad.edit',$actividad->id)}}" method="post">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="submit" class="btn btn-warning btn-sm mx-3" value="Editar">
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-row justify-content-center">
                                                <form action="{{route('actividad.destroy',$actividad->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger btn-sm mx-3" value="Eliminar">
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                                
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$actividades->links()}}
                </div>
            </div>
        </div>
    </div>
    @endsection
