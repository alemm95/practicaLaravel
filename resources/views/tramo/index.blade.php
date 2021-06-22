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
                        
                            <tr>
                              <th>Hora</th>
                              @foreach ($dias as $dia)
                                <th>{{$dia}}</th>
                              @endforeach
                            </tr>

                            @foreach ($horas as $hora)
                              <tr>
                                <td>{{$hora}}</td>
                                <td>
                                  @foreach ($tramos as $tramo)
                                    @if ($dias[0] == $tramo->dia AND $hora == $tramo->hora_inicio)
                                      @foreach ($actividades as $actividad)
                                        @if ($actividad->id == $tramo->actividad_id)
                                          <form action="{{route('mistramos.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                            <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                            <input type="submit" class="btn btn-success btn-lg" style="width: 1." value="{{$actividad->name}}">
                                          </form>
                                          @if (Auth::user()->role_id == 1)
                                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" class="btn btn-danger btn-sm mt-1" style="width: 1." value="Borrar">
                                            </form>
                                          @endif
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </td>

                                <td>
                                  @foreach ($tramos as $tramo)
                                    @if ($dias[1] == $tramo->dia AND $hora == $tramo->hora_inicio)
                                      @foreach ($actividades as $actividad)
                                        @if ($actividad->id == $tramo->actividad_id)
                                        <form action="{{route('mistramos.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                            <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                            <input type="submit" class="btn btn-success btn-lg" style="width: 1." value="{{$actividad->name}}">
                                          </form>
                                          @if (Auth::user()->role_id == 1)
                                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" class="btn btn-danger btn-sm mt-1" style="width: 1." value="Borrar">
                                            </form>
                                          @endif
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </td>

                                <td>
                                  @foreach ($tramos as $tramo)
                                    @if ($dias[2] == $tramo->dia AND $hora == $tramo->hora_inicio)
                                      @foreach ($actividades as $actividad)
                                        @if ($actividad->id == $tramo->actividad_id)
                                        <form action="{{route('mistramos.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                            <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                            <input type="submit" class="btn btn-success btn-lg" style="width: 1." value="{{$actividad->name}}">
                                          </form>
                                          @if (Auth::user()->role_id == 1)
                                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" class="btn btn-danger btn-sm mt-1" style="width: 1." value="Borrar">
                                            </form>
                                          @endif
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </td>

                                <td>
                                  @foreach ($tramos as $tramo)
                                    @if ($dias[3] == $tramo->dia AND $hora == $tramo->hora_inicio)
                                      @foreach ($actividades as $actividad)
                                        @if ($actividad->id == $tramo->actividad_id)
                                        <form action="{{route('mistramos.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                            <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                            <input type="submit" class="btn btn-success btn-lg" style="width: 1." value="{{$actividad->name}}">
                                          </form>
                                          @if (Auth::user()->role_id == 1)
                                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" class="btn btn-danger btn-sm mt-1" style="width: 1." value="Borrar">
                                            </form>
                                          @endif
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </td>

                                <td>
                                  @foreach ($tramos as $tramo)
                                    @if ($dias[4] == $tramo->dia AND $hora == $tramo->hora_inicio)
                                      @foreach ($actividades as $actividad)
                                        @if ($actividad->id == $tramo->actividad_id)
                                        <form action="{{route('mistramos.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                            <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                            <input type="submit" class="btn btn-success btn-lg" style="width: 1." value="{{$actividad->name}}">
                                          </form>
                                          @if (Auth::user()->role_id == 1)
                                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" class="btn btn-danger btn-sm mt-1" style="width: 1." value="Borrar">
                                            </form>
                                          @endif
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </td>

                                <td>
                                  @foreach ($tramos as $tramo)
                                    @if ($dias[5] == $tramo->dia AND $hora == $tramo->hora_inicio)
                                      @foreach ($actividades as $actividad)
                                        @if ($actividad->id == $tramo->actividad_id)
                                        <form action="{{route('mistramos.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="idact" value="{{$actividad->id}}"/>
                                            <input type="hidden" name="idtramo" value="{{$tramo->id}}"/>
                                            <input type="submit" class="btn btn-success btn-lg" style="width: 1." value="{{$actividad->name}}">
                                          </form>
                                          @if (Auth::user()->role_id == 1)
                                            <form action="{{route('tramo.destroy', $tramo->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" class="btn btn-danger btn-sm mt-1" style="width: 1." value="Borrar">
                                            </form>
                                          @endif
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </td>
                              </tr>

                            @endforeach
                                
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection