<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Actividad;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
Use Redirect;

class ActividadController extends Controller
{
    public function index(Request $request){
        $text=trim($request->get('text'));
        $order=$request->get('order');
        $filter='id';
        
        if($order==1){
            $filter='id';
        }
        if($order==2){
            $filter='name';
        }
        if($order==3){
            $filter='aforo';
        }
 
        $actividades=DB::table('actividades')
            ->select('id','name','aforo')
            ->where('name','LIKE','%'.$text.'%')
            ->orWhere('aforo','LIKE','%'.$text.'%')
            ->orderBy($filter,'asc')
            ->paginate(2);

        //$roles = $users->get()->role->name;
        return view('actividad.index',compact('actividades','text'));
    }

    public function create()
    {
        return view('actividad.create');
    }

    public function store(Request $request)
    {
        $actividad = new Actividad;

        $v = \Validator::make($request->all(), [

            'name' => 'required|string|max:255|unique:actividades',
            'descripcion' => 'required|string|max:255',
            'aforo' => 'required|integer|min:5|max:30'
            
        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $actividad=Actividad::create($request->all());

        return redirect('actividad/create')->with('status', 'Actividad registrada correctamente');
    }

    public function destroy($id)
    {
        $actividad=Actividad::findOrFail($id);
        $actividad->delete();
        return redirect()->route('actividad.index');
    }

    public function edit($id)
    {
        $actividad=Actividad::findOrFail($id);
        return view('actividad.edit',compact('actividad'));
    }

    public function update(Request $request, $id)
    {
        $actividad=Actividad::findOrFail($id);
        

            $v = \Validator::make($request->all(), [

                'name' => 'required|string|max:255|unique:actividades',
                'descripcion' => 'required|string|max:255',
                'aforo' => 'required|integer|min:5|max:30'
                
            ]);

            if ($v->fails()){
                return redirect()->back()->withInput()->withErrors($v->errors());
            }

            $actividad->name=$request->name;
            $actividad->descripcion=$request->descripcion;
            $actividad->aforo=$request->aforo;
            $actividad->save();


            return redirect()->route('actividad.index')->with(['success','Actividad actualizada con éxito']);

            
        
    }


}
