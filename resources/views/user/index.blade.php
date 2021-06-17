@extends('layouts.app')

@section('content')

    <div class="container">
    


    <!-- {{Session::flash('','')}} -->
        <h2>Gestión de Usuarios</h2>
        <div class="inline-block mr-2 mt-2">
            <div class="col-lx-12">
                <form action="{{route('user.index')}}" method="get">
                    <div class="form-row justify-content-center">
                        <div class="col-sm-2 my-1">
                            <input type="text" class="form-control" name="text" value="{{$text}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-1">
                            <form action="{{route('user.index')}}" method="get">
                                <select class="form-select form-select-lg mb-3 my-2 ml-5" name="order">
                                    <option selected value="1">Seleccione el campo</option>
                                    <option value="1">ID</option>
                                    <option value="2">Nombre</option>
                                    <option value="3">Email</option>
                                    <option value="4">Dirección</option>
                                    <option value="5">Teléfono</option>
                                </select>
                            </div>
                            <div class="col-auto my-1">
                                <input type="submit" class="btn btn-primary mr-5" value="Ordenar">
                            </div>
                            </form>
                            <div class="col-auto my-1">
                                <form action="{{route('user.index')}}" method="get">
                                <select class="form-select form-select-lg mb-3 my-2 ml-2" name="page">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </div>
                                <div class="col-auto my-1">
                                    <input type="submit" class="btn btn-primary mr-5" value="Ir a página">
                                </div>
                            </form>
                            <div class="col-auto my-1">
                            <a href="{{route('user.create')}}" class="btn btn-success">Insertar</a>
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
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users)<=0)
                                <tr>
                                    <td colspan="4">No hay resultados</td>
                                </tr>
                            @else
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <div class="form-row justify-content-center">
                                            <form action="{{route('user.edit',$user->id)}}" method="post">
                                                @csrf
                                                @method('GET')
                                                <input type="submit" class="btn btn-warning btn-sm mx-3" value="Editar">
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row justify-content-center">
                                            <form action="{{route('user.destroy',$user->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger btn-sm mx-3" value="Eliminar">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
    @endsection
