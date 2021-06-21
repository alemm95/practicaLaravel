@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="text-center">Horario</h2>
        <div class="inline-block mr-2 mt-2">
            
            <div class="col-xl-12">
                <div class="table-responsive">
                @if(Auth::user()->role_id == 1)
                  <div class="col-auto my-1">
                            <a href="{{route('tramo.create')}}" class="btn btn-primary mr-5">Insertar Clase</a>
                        </div>
                        @endif
                    <table class="table table-striped text-center">
                        <thead>
                        {{-- @foreach ($tramos as $tramo) --}}
                            <tr>
                                <th>Hora</th>
                              <th>Lunes</th>
                              <th>Martes</th>
                              <th>Miercoles</th>
                              <th>Jueves</th>
                              <th>Viernes</th>
                              <th>Sabado</th>
                            </tr>
                                
                        </thead>
                        <tbody>
                            @foreach ($horas as $hora)
                            
                                <tr>
                                    <td>{{$hora->hora_inicio . '-' . $hora->hora_fin}}  </td>

                                    <td>
                                    @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Lunes')
                                @foreach ($actividades as $actividad)
                                @if ($tramo->actividad_id == $actividad->id)
                                <form action="{{route('mistramos.store')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                  <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                  <input type="submit" class="btn btn-success" style="width: 1." value="{{$actividad->name}}">
                            </form>
                            @if (Auth::user()->role_id == 1)
                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="submit" class="btn btn-danger mt-1" style="width: 1." value="Borrar">
                            </form>
                            @endif
                                @endif
                                @endforeach
                                  @endif
                                  @endforeach
                                    </td>

                                    <td>
                                    @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Martes')
                                @foreach ($actividades as $actividad)
                                @if ($tramo->actividad_id == $actividad->id)
                                <form action="{{route('mistramos.store')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                  <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                  <input type="submit" class="btn btn-success" style="width: 1." value="{{$actividad->name}}">
                            </form>
                            @if (Auth::user()->role_id == 1)
                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="submit" class="btn btn-danger mt-1" style="width: 1." value="Borrar">
                            </form>
                            @endif
                                @endif
                                @endforeach
                                  @endif
                                  @endforeach
                                    </td>

                                    <td>
                                    @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Miercoles')
                                @foreach ($actividades as $actividad)
                                @if ($tramo->actividad_id == $actividad->id)
                                <form action="{{route('mistramos.store')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                  <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                  <input type="submit" class="btn btn-success" style="width: 1." value="{{$actividad->name}}">
                            </form>
                            @if (Auth::user()->role_id == 1)
                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="submit" class="btn btn-danger mt-1" style="width: 1." value="Borrar">
                            </form>
                            @endif
                                @endif
                                @endforeach
                                  @endif
                                  @endforeach
                                    </td>

                                    <td>
                                    @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Jueves')
                                @foreach ($actividades as $actividad)
                                @if ($tramo->actividad_id == $actividad->id)
                                <form action="{{route('mistramos.store')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                  <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                  <input type="submit" class="btn btn-success" style="width: 1." value="{{$actividad->name}}">
                              
                            </form>
                            @if (Auth::user()->role_id == 1)
                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="submit" class="btn btn-danger mt-1" style="width: 1." value="Borrar">
                            </form>
                            @endif
                                @endif
                                @endforeach
                                  @endif
                                  @endforeach
                                    </td>

                                    <td>
                                    @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Viernes')
                                @foreach ($actividades as $actividad)
                                @if ($tramo->actividad_id == $actividad->id)
                                <form action="{{route('mistramos.store')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                  <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                  <input type="submit" class="btn btn-success" style="width: 1." value="{{$actividad->name}}">
                            </form>
                            @if (Auth::user()->role_id == 1)
                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="submit" class="btn btn-danger mt-1" style="width: 1." value="Borrar">
                            </form>
                            @endif
                                @endif
                                @endforeach
                                  @endif
                                  @endforeach
                                    </td>

                                    <td>
                                    @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Sabado')
                                @foreach ($actividades as $actividad)
                                @if ($tramo->actividad_id == $actividad->id)
                                <form action="{{route('mistramos.store')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                  <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                  <input type="submit" class="btn btn-success" style="width: 1." value="{{$actividad->name}}">
                              
                            </form>
                            @if (Auth::user()->role_id == 1)
                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="submit" class="btn btn-danger mt-1" style="width: 1." value="Borrar">
                            </form>
                            @endif
                                @endif
                                @endforeach
                                  @endif
                                  @endforeach
                                    </td>

                                    

                                    
                                </tr>
                                
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection