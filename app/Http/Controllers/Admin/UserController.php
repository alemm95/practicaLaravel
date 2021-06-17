<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
Use Redirect;

class UserController extends Controller
{
    public function config()
    {
        return view('user.config');
    }

    public function index(Request $request){

    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        if($request->input('name')!=''){
            $user->name=$request->input('name');
        }
        if($request->input('email')!=''){
            $user->email=$request->input('email');
        }
        if(($request->input('password')!='') && (strlen(trim($request->input('password')>=8)))){
            $user->password=Hash::make($request->input('password'));
        }
        if($request->input('address')!=''){
            $user->address=$request->input('address');
        }
        if($request->input('phone')!=''){
            $user->phone=$request->input('phone');
        }
        if(($user->name!='') && ($user->email!='') && ($user->address!='') && ($user->phone!='')){
            $user->save();

            return redirect()->route('user.index')->with(['success','Registro actualizado con éxito']);
        }else{
            return redirect()->route('user.index')->with(['error','El registro no se ha podido actualizar']);
        }
        
    }

    public function destroy($id)
    {
        
    }

    
}
