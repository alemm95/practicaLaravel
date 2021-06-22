<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use App\Models\Tramo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramoController extends Controller
{
    public function index()
    {
        $tramos = Tramo::all();
        $actividades = Actividad::all();

        $horas = ["08:00:00","09:00:00", "10:00:00", "11:00:00", "12:00:00", "13:00:00","14:00:00", "15:00:00","16:00:00", "17:00:00", "18:00:00", "19:00:00", "20:00:00", "21:00:00"];

        $dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];

        /* $horas = DB::table('tramos')->orderBy('hora_inicio')->get(); */

        return view('tramo.index', compact('tramos', 'actividades', 'horas', 'dias'));
    }

    public function create()
    {
        $actividades = Actividad::all();

        return view('tramo.create', compact('actividades'));
    }

    public function store(Request $request)
    {
        $tramos = Tramo::All();
        $ocupado = false;
        $request->validate([
            'dia' => 'required|string|max:255',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'actividad_id' => 'required|integer',
            'fecha_alta' => 'required|date_format:Y-m-d',
            'fecha_baja' => 'required|date_format:Y-m-d',
        ]);

        foreach ($tramos as $tramo) {
            if ($tramo->hora_inicio <= $request->hora_inicio && $tramo->hora_fin >= $request->hora_fin && $tramo->dia == $request->dia) {
                $ocupado = true;
            }
        }

        if (!$ocupado) {
            Tramo::create([
            'dia' => $request->dia,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'actividad_id' => $request->actividad_id,
            'fecha_alta' => $request->fecha_alta,
            'fecha_baja' => $request->fecha_baja,
        ]);

            return redirect()->route('tramo.index')->with(['status' => 'Clase agregada con éxito']);
        }

        return redirect()->route('tramo.create')->with(['status' => 'Clase ocupada']);
    }

    public function destroy($id)
    {
        $tramo=Tramo::findOrFail($id);
        $tramo->delete();
        return redirect()->route('tramo.index');
    }
}
