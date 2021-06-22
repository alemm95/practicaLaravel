@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="text-center">Mis clases</h2>
        <div class="inline-block mr-2 mt-2">
            
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Día</th>
                                <th>Hora inicio</th>
                                <th>Hora fin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tramxus as $t)
                               
                               <tr>
                                   <td>
                                       <div>
                                           {{-- <span>{{$t->user_id}}</span> --}}
                                           @foreach ($tramos as $tramo)
                                           @if($t->tramo_id==$tramo->id)
                                           @foreach ($actividades as $actividad)
                                           @if ($tramo->actividad_id == $actividad->id)  
                                           <span>{{$actividad->name}}</span>
                                           @endif
                                           @endforeach
                                           @endif
                                           @endforeach 
                                           
                                       </div>
                                   </td>
                                   <td>
                                       <div>
                                           @foreach ($tramos as $tramo)
                                           @if($t->tramo_id==$tramo->id)
                                           <span>{{$tramo->dia}}</span>
                                           @endif
                                           @endforeach 
                                       </div>
                                   </td>
                                   <td>
                                       <div>
                                           @foreach ($tramos as $tramo)
                                           @if($t->tramo_id==$tramo->id)
                                           <span>{{$tramo->hora_inicio}}</span>
                                           @endif
                                           @endforeach 
                                       </div>
                                   </td>
                                   <td>
                                       <div>
                                           
                                           @foreach ($tramos as $tramo)
                                           @if($t->tramo_id==$tramo->id)
                                           <span>{{$tramo->hora_fin}}</span>
                                           @endif
                                           @endforeach 
                                       </div>
                                   </td>
                                   <td>
                                        <div>
                                            <div>
                                            @foreach ($tramos as $tramo)
                                                @if($t->tramo_id==$tramo->id)
                                                <form action="{{route('mistramos.destroy',$t->tramo_id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <input type="submit" class="btn btn-danger btn-sm mx-3" value="Eliminar"></button>
                                                </form>
                                                @endif
                                                @endforeach 
                                            </div>
                                        
                                        </div>
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