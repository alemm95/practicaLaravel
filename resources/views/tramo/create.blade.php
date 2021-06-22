@extends('layouts.app')

@section('content')

    <div class="container">   
        <h2 class="text-center">Insertar clase</h2>
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
                <form action="{{route('tramo.store')}}" method="post">
                @csrf
                    <div class="form-group">
                    <select class="form-control form-select-lg" name="dia">
                                    <option selected value="">Seleccione el dia</option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miercoles">Miercoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sabado">Sabado</option>
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="hora_inicio">Hora de inicio</label>
                        <input type="time" class="form-control" name="hora_inicio" required>
                    </div>

                    <div class="form-group">
                        <label for="hora_fin">Hora de fin</label>
                        <input type="time" class="form-control" name="hora_fin" required>
                    </div>
                    <div class="form-group">
                    <select class="form-control form-select-lg" name="actividad_id">
                                    <option selected value="">Seleccione la actividad</option>
                                    @foreach ($actividades as $actividad)
                                    <option value="{{ $actividad->id }}">{{$actividad->name}}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_alta">Fecha de alta</label>
                        <input type="date" class="form-control" name="fecha_alta" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_baja">Fecha de baja</label>
                        <input type="date" class="form-control" name="fecha_baja" required>
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