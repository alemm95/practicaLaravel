<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
Use Redirect;

class UserController extends Controller
{
    public function config(){
        return view('user.config');
    }

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
            $filter='email';
        }
        if($order==4){
            $filter='address';
        }
        if($order==5){
            $filter='phone';
        }
 
        $users=DB::table('users')
            ->select('id','name','email','address','phone')
            ->where('name','LIKE','%'.$text.'%')
            ->orWhere('email','LIKE','%'.$text.'%')
            ->orWhere('address','LIKE','%'.$text.'%')
            ->orWhere('phone','LIKE','%'.$text.'%')
            ->orderBy($filter,'asc')
            ->paginate(5);
        return view('user.index',compact('users','text'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new User;

        $v = \Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|between:8,255|confirmed',
            'address' => 'required|string|max:255',
            'phone' => 'required|integer|min:600000000|max:999999999',
            
        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $user->create($request->all());
        $users=User::all();
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        if ($request->password == '') {
            $v = \Validator::make($request->all(), [

                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|',
                'address' => 'required|string|max:255',
                'phone' => 'required|integer|min:600000000|max:999999999',
                
            ]);

            if ($v->fails()){
                return redirect()->back()->withInput()->withErrors($v->errors());
            }

            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->phone=$request->phone;
            $user->save();

        } else{

            $v = \Validator::make($request->all(), [

                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|',
                'password' => 'required|between:8,255|confirmed',
                'address' => 'required|string|max:255',
                'phone' => 'required|integer|min:600000000|max:999999999',
                
            ]);

            if ($v->fails()){
                return redirect()->back()->withInput()->withErrors($v->errors());
            }

            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->address=$request->address;
            $user->phone=$request->phone;
            $user->save();
    }

            return redirect()->route('user.index')->with(['success','Registro actualizado con éxito']);
        
    }


    public function updateUser(Request $request)
    {
        $user = User::find(Auth::user()->id);

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

            return redirect()->route('home')->with(['success','Registro actualizado con éxito']);
        }else{
            return redirect()->route('home')->with(['error','El registro no se ha podido actualizar']);
        }
       

        
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }

    
}