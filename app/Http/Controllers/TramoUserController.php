<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Tramo;
use App\Models\TramoUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TramoUserController extends Controller
{
    public function index()
    {
        $iduser = Auth::user()->id;

        $tramxus = TramoUser::where('user_id', $iduser)->paginate(3);
        $tramos = Tramo::all();

        $actividades = Actividad::All();

        return view('mistramos.index', compact('tramos', 'tramxus', 'actividades'));
    }

    public function list()
    {
        return view('mistramos.list');
    }

    public function store(Request $request)
    {
        $ocupado = false;
        $tramos = TramoUser::All();

        foreach ($tramos as $tramo) {
            if ($request->idtramo == $tramo->tramo_id && Auth::user()->id == $tramo->user_id) {
                $ocupado = true;
            }
        }
        if (!$ocupado) {

            TramoUser::create([
                'user_id' => Auth::user()->id,
                'tramo_id' => $request->idtramo,
            ]);

            return redirect()->route('mistramos.index')->with(['status' => 'Registro añadido con éxito']);
        } else {
            return redirect()->route('mistramos.index')->with(['status' => 'El registro ya existe']);
        }
    }

        public function destroy($tramo_id)
    {
        $iduser = Auth::user()->id;
        $del = TramoUser::where('tramo_id', $tramo_id)->where('user_id', $iduser);
        $del->delete();

        return redirect()->route('mistramos.index')->with(['status' => 'Registro borrado con éxito']);
    }
    }

